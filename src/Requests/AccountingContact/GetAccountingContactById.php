<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getAccountingContactById
 *
 * Returns a single accounting contac
 */
class GetAccountingContactById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $accountingContactId ID of accounting contact to return
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
