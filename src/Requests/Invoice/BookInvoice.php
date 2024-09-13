<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * bookInvoice
 *
 * Booking the invoice with a transaction is probably the most important part in the bookkeeping
 * process.<br> There are several ways on correctly booking an invoice, all by using the same
 * endpoint.<br> for more information look <a href='#tag/Invoice/How-to-book-an-invoice'>here</a>.
 */
class BookInvoice extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of invoice to book
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/bookAmount";
    }
}
