<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteResetToOpen
 *
 * Resets the status "Open" (`"status": "200"`). Linked transactions will be unlinked.<br>
 * This is not
 * possible if the credit note itself or one of its transactions (CheckAccountTransaction) is already
 * enshrined.
 *
 * This endpoint cannot be used to increase the status to "Open" (`"status":
 * "200"`).<br>
 * Use [CreditNote/{creditNoteId}/sendBy](#tag/CreditNote/operation/creditNoteSendBy) /
 * [CreditNote/{creditNoteId}/sendViaEmail](#tag/CreditNote/operation/sendCreditNoteViaEMail) instead.
 */
class CreditNoteResetToOpen extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of the credit note to reset
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/resetToOpen";
    }
}
