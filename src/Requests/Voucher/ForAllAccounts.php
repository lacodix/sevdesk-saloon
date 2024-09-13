<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forAllAccounts
 *
 * You can use this endpoint to help you decide which accounts you can use when creating a voucher
 */
class ForAllAccounts extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ReceiptGuidance/forAllAccounts';
    }
}
