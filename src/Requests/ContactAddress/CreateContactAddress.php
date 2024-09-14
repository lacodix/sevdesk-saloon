<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Lacodix\SevdeskSaloon\Enums\Countries;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContactAddress
 *
 * Creates a new contact address.
 */
class CreateContactAddress extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $contactId,
        protected array $data
    ) {
        $this->data['contact'] = [
            'id' => $contactId,
            'objectName' => 'Contact',
        ];
        $this->data['country'] ??= [
            'id' => Countries::GERMANY->value,
            'objectName' => 'StaticCountry',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/ContactAddress';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
