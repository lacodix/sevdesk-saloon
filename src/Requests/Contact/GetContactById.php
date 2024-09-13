<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactById
 *
 * Returns a single contact
 */
class GetContactById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $contactId ID of contact to return
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
