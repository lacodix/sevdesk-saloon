<?php

use Lacodix\SevdeskSaloon\Enums\ContactType;
use Lacodix\SevdeskSaloon\Requests\Contact\CreateContact;
use Lacodix\SevdeskSaloon\Requests\ContactAddress\CreateContactAddress;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetInvoices;
use Lacodix\SevdeskSaloon\Requests\StaticCountry\GetStaticCountriesByIsoCode;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('uses an explicit invoice tax rule while retaining the existing request fields', function () {
    $mockClient = new MockClient([
        CreateInvoice::class => MockResponse::make(['objects' => ['invoice' => ['id' => '10']]]),
    ]);

    connector()->sevSend(new CreateInvoice(
        20,
        [[
            'name' => 'Membership',
            'price' => '100.00',
            'taxRate' => '7.00',
        ]],
        [
            'taxRuleId' => 42,
            'taxRate' => '7.00',
            'showNet' => true,
            'customerInternalNote' => 'membergy-invoice:test',
            'invoiceNumber' => null,
        ],
    ), $mockClient);

    $mockClient->assertSent(function ($request): bool {
        if (! $request instanceof CreateInvoice) {
            return false;
        }

        $body = $request->body()->all();

        expect($body['invoice']['taxRule'])->toBe([
            'id' => 42,
            'objectName' => 'TaxRule',
        ])->and($body['invoice']['taxRate'])->toBe('7.00')
            ->and($body['invoice']['showNet'])->toBeTrue()
            ->and($body['invoice']['customerInternalNote'])->toBe('membergy-invoice:test')
            ->and($body['invoice']['invoiceNumber'])->toBeNull()
            ->and($body['invoicePosSave'][0]['taxRate'])->toBe('7.00');

        return true;
    });
});

it('falls back to the connector tax rule for existing callers', function () {
    $mockClient = new MockClient([
        CreateInvoice::class => MockResponse::make(['objects' => ['invoice' => ['id' => '10']]]),
    ]);

    connector()->sevSend(new CreateInvoice(
        20,
        [['name' => 'Membership', 'price' => '100.00']],
        [],
    ), $mockClient);

    $mockClient->assertSent(function ($request): bool {
        return $request instanceof CreateInvoice
            && $request->body()->all()['invoice']['taxRule'] === [
                'id' => 1,
                'objectName' => 'TaxRule',
            ];
    });
});

it('sends the official misspelled invoice correlation filter', function () {
    $mockClient = new MockClient([
        GetInvoices::class => MockResponse::make(['objects' => []]),
    ]);
    $connector = connector();
    $connector->withMockClient($mockClient);

    $connector->invoice()->findByCustomerInternalNote('membergy-invoice:test');

    $mockClient->assertSent(function ($request): bool {
        return $request instanceof GetInvoices
            && $request->query()->all() === [
                'customerIntenalNote' => 'membergy-invoice:test',
            ];
    });
});

it('keeps the existing invoice list signature compatible', function () {
    $request = new GetInvoices(100, 'RE-1', 10, 20, 30, 'Contact');

    expect($request->defaultQuery())->toBe([
        'status' => 100,
        'invoiceNumber' => 'RE-1',
        'startDate' => 10,
        'endDate' => 20,
        'contact[id]' => 30,
        'contact[objectName]' => 'Contact',
    ]);
});

it('looks up a static country with a normalized ISO-2 query', function () {
    $mockClient = new MockClient([
        GetStaticCountriesByIsoCode::class => MockResponse::make([
            'objects' => [['id' => '1', 'objectName' => 'StaticCountry', 'code' => 'DE']],
        ]),
    ]);
    $connector = connector();
    $connector->withMockClient($mockClient);

    $countries = $connector->staticCountry()->getByIsoCode(' de ');

    expect($countries)->toHaveCount(1)
        ->and($countries[0]['id'])->toBe('1');

    $mockClient->assertSent(function ($request): bool {
        return $request instanceof GetStaticCountriesByIsoCode
            && $request->query()->all() === ['code' => 'DE'];
    });
});

it('passes VAT and explicit static country data through existing contact primitives', function () {
    $contact = new CreateContact(ContactType::CUSTOMER, [
        'name' => 'Example Club',
        'vatNumber' => 'DE123456789',
    ]);
    $address = new CreateContactAddress(20, [
        'street' => 'Main Street 1',
        'zip' => '12345',
        'city' => 'Berlin',
        'country' => ['id' => 18, 'objectName' => 'StaticCountry'],
    ]);

    expect($contact->defaultBody()['vatNumber'])->toBe('DE123456789')
        ->and($address->defaultBody()['country'])->toBe([
            'id' => 18,
            'objectName' => 'StaticCountry',
        ]);
});

it('retains the existing Germany address fallback', function () {
    $address = new CreateContactAddress(20, [
        'street' => 'Main Street 1',
        'zip' => '12345',
        'city' => 'Berlin',
    ]);

    expect($address->defaultBody()['country'])->toBe([
        'id' => 1,
        'objectName' => 'StaticCountry',
    ]);
});
