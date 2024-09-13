<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * sendInvoiceViaEMail
 *
 * This endpoint sends the specified invoice to a customer via email.<br>
 *     This will automatically
 * mark the invoice as sent.<br>
 *     Please note, that in production an invoice is not allowed to be
 * changed after this happened!
 */
class SendInvoiceViaEmail extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $invoiceId ID of invoice to be sent via email
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/sendViaEmail";
    }
}
