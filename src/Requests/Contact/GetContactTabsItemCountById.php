<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactTabsItemCountById
 *
 * Get number of all invoices, orders, etc. of a specified contact
 */
class GetContactTabsItemCountById extends Request
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
        return "/Contact/{$this->contactId}/getTabsItemCount";
    }
}
