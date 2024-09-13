<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContact
 *
 * Update a contact
 */
class UpdateContact extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $contactId ID of contact to update
     */
    public function __construct(
        protected int $contactId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Contact/{$this->contactId}";
    }
}
