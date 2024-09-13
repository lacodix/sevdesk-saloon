<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forRevenue
 *
 * Provides all possible combinations for revenue accounts to be used with revenue receipts/vouchers.
 */
class ForRevenue extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ReceiptGuidance/forRevenue';
    }
}
