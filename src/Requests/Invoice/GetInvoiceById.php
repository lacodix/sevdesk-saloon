<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoiceById
 *
 * Returns a single invoice
 */
class GetInvoiceById extends Request
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
        return "/Invoice/{$this->invoiceId}";
    }
}
