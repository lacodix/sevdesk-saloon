<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * bookInvoice
 *
 * Booking the invoice with a transaction is probably the most important part in the bookkeeping
 * process.<br> There are several ways on correctly booking an invoice, all by using the same
 * endpoint.<br> for more information look <a href='#tag/Invoice/How-to-book-an-invoice'>here</a>.
 */
class BookInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of invoice to book
     */
    public function __construct(
        protected int $invoiceId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/bookAmount";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
