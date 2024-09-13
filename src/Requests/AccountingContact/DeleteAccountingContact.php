<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteAccountingContact
 *
 * Attention, deleting an existing AccountingContact can lead to **booking errors**, especially in the
 * **DATEV export**.
 * Compatibility of sevdesk with DATEV is no longer guaranteed.
 */
class DeleteAccountingContact extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $accountingContactId Id of accounting contact resource to delete
     */
    public function __construct(
        protected int $accountingContactId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/AccountingContact/{$this->accountingContactId}";
    }
}
