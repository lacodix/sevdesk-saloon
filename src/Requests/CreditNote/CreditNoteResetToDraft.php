<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteResetToDraft
 *
 * Resets the status to "Draft" (`"status": "100"`).<br>
 * This is only possible if the credit note has
 * the status "Open" (`"status": "200"`).<br>
 * If it has a higher status use
 * [CreditNote/{creditNoteId}/resetToOpen](#tag/CreditNote/operation/creditNoteResetToOpen) first.
 */
class CreditNoteResetToDraft extends Request
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
        return "/CreditNote/{$this->creditNoteId}/resetToDraft";
    }
}
