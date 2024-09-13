<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * cancelInvoice
 *
 * This endpoint will cancel the specified invoice therefor creating a cancellation invoice.<br>
 *
 * The cancellation invoice will be automatically paid and the source invoices status will change to
 * 'cancelled'.
 */
class CancelInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $invoiceId ID of invoice to be cancelled
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/cancelInvoice";
    }
}
