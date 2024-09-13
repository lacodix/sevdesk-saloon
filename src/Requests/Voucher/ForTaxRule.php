<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * forTaxRule
 *
 * You can use this endpoint to get additional information about the tax rule (for example,
 * USTPFL_UMS_EINN) that you may want to use.
 */
class ForTaxRule extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string $taxRule The code of the tax rule you want to get guidance for.
     */
    public function __construct(
        protected string $taxRule,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/ReceiptGuidance/forTaxRule';
    }

    public function defaultQuery(): array
    {
        return array_filter(['taxRule' => $this->taxRule]);
    }
}
