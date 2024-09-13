<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * sendCreditNoteViaEMail
 *
 * This endpoint sends the specified credit note to a customer via email.<br>
 *     This will
 * automatically mark the credit note as sent.<br>
 *     Please note, that in production an credit note
 * is not allowed to be changed after this happened!
 */
class SendCreditNoteViaEmail extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $creditNoteId ID of credit note to be sent via email
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/sendViaEmail";
    }
}
