<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forAccountNumber
 *
 * You can use this endpoint to get additional information about the account that you may want to use.
 */
class ForAccountNumber extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $accountNumber The datev account number you want to get additional information of
     */
    public function __construct(
        protected int $accountNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/ReceiptGuidance/forAccountNumber';
    }

    public function defaultQuery(): array
    {
        return array_filter(['accountNumber' => $this->accountNumber]);
    }
}
