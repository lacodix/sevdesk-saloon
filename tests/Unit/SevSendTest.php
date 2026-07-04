<?php

use Lacodix\SevdeskSaloon\Requests\Basics\BookkeepingSystemVersion;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetInvoices;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('strips the objects wrapper by default', function () {
    $mockClient = new MockClient([
        GetInvoices::class => MockResponse::make(['objects' => [['id' => '1']]]),
    ]);

    $result = connector()->sevSend(new GetInvoices(), $mockClient);

    expect($result)->toBe([['id' => '1']]);
});

it('strips the objects wrapper from factory create responses', function () {
    // Regression: the live API wraps Factory/save* payloads in "objects",
    // contrary to the OpenAPI spec (v0.16.0 broke this with a null wrapper).
    $mockClient = new MockClient([
        CreateInvoice::class => MockResponse::make([
            'objects' => [
                'invoice' => ['id' => '80356663', 'invoiceNumber' => 'RE-241002'],
                'invoicePos' => [],
            ],
        ]),
    ]);

    $request = new CreateInvoice(1, [['name' => 'Base Fee', 'price' => 10.0]], []);
    $result = connector()->sevSend($request, $mockClient);

    expect($result['invoice']['id'])->toBe('80356663')
        ->and($result['invoice']['invoiceNumber'])->toBe('RE-241002');
});

it('falls back to the full body when the wrapper key is missing', function () {
    $mockClient = new MockClient([
        CreateInvoice::class => MockResponse::make([
            'invoice' => ['id' => '80356663'],
            'invoicePos' => [],
        ]),
    ]);

    $request = new CreateInvoice(1, [['name' => 'Base Fee', 'price' => 10.0]], []);
    $result = connector()->sevSend($request, $mockClient);

    expect($result['invoice']['id'])->toBe('80356663');
});

it('returns the full body for requests declaring a null wrapper', function () {
    $mockClient = new MockClient([
        BookkeepingSystemVersion::class => MockResponse::make(['version' => '2.0']),
    ]);

    $result = connector()->sevSend(new BookkeepingSystemVersion(), $mockClient);

    expect($result)->toBe(['version' => '2.0']);
});

it('throws on unsuccessful responses', function () {
    $mockClient = new MockClient([
        GetInvoices::class => MockResponse::make(['error' => 'nope'], 500),
    ]);

    connector()->sevSend(new GetInvoices(), $mockClient);
})->throws(Exception::class);
