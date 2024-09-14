<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContactfield
 *
 * Update a contact field
 */
class UpdateContactfield extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $contactCustomFieldId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomField/{$this->contactCustomFieldId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
