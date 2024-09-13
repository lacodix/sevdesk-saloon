<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getAccountingContact
 *
 * Returns all accounting contact which have been added up until now. Filters can be added.
 */
class GetAccountingContact extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $contactid ID of contact for which you want the accounting contact.
     * @param string|null $contactobjectName Object name. Only needed if you also defined the ID of a contact.
     */
    public function __construct(
        protected ?string $contactid = null,
        protected ?string $contactobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/AccountingContact';
    }

    public function defaultQuery(): array
    {
        return array_filter(['contact[id]' => $this->contactid, 'contact[objectName]' => $this->contactobjectName]);
    }
}
