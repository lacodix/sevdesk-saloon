<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getIsInvoicePartiallyPaid
 *
 * Returns 'true' if the given invoice is partially paid - 'false' if it is not.
 *     Invoices which
 * are completely paid are regarded as not partially paid.
 */
class GetIsInvoicePartiallyPaid extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $invoiceId ID of invoice to return
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/getIsPartiallyPaid";
    }
}
