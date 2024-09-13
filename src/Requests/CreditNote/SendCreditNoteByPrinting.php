<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * sendCreditNoteByPrinting
 *
 * Sending a credit note to end-customers is an important part of the bookkeeping process.<br>
 * Depending on the way you want to send the credit note, you need to use different endpoints.<br>
 * Let's start with just printing out the credit note, meaning we only need to render the pdf.
 */
class SendCreditNoteByPrinting extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $creditNoteId ID of creditNote to return
     * @param string $sendType the type you want to print.
     */
    public function __construct(
        protected int $creditNoteId,
        protected string $sendType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/sendByWithRender";
    }

    public function defaultQuery(): array
    {
        return array_filter(['sendType' => $this->sendType]);
    }
}
