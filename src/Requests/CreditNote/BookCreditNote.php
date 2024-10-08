<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * bookCreditNote
 *
 * Booking the credit note with a transaction is probably the most important part in the bookkeeping
 * process.<br> There are several ways on correctly booking a credit note, all by using the same
 * endpoint.<br> Conveniently, the booking process is exactly the same as the process for invoices and
 * vouchers.<br> For this reason, you can have a look at it in the <a
 * href='#tag/Invoice/How-to-book-an-invoice'>invoice chapter</a> and all you need to do is to change
 * "Invoice" into "CreditNote" in the URL.
 */
class BookCreditNote extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of credit note to book
     */
    public function __construct(
        protected int $creditNoteId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/bookAmount";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
