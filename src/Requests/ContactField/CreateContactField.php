<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContactField
 *
 * Create contact field
 */
class CreateContactField extends Request implements HasBody
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
    }

    public function resolveEndpoint(): string
    {
        return '/ContactCustomField';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
