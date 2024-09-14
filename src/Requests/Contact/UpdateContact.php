<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContact
 *
 * Update a contact
 */
class UpdateContact extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $contactId ID of contact to update
     */
    public function __construct(
        protected int $contactId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Contact/{$this->contactId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
