<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContact
 */
class DeleteContact extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $contactId Id of contact resource to delete
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
