<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateAccountingContact
 *
 * Attention, updating an existing AccountingContact can lead to **booking errors**, especially in the
 * **DATEV export**.
 * Compatibility of sevdesk with DATEV is no longer guaranteed.
 */
class UpdateAccountingContact extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $accountingContactId ID of accounting contact to update
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
