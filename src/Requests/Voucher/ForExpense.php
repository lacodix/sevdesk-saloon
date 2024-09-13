<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forExpense
 *
 * Provides all possible combinations for expense accounts to be used with expense receipts/vouchers.
 */
class ForExpense extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ReceiptGuidance/forExpense';
    }
}
