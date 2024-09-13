<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteEnshrine
 *
 * Sets the current date and time as a value for the property `enshrined`.<br>
 * This operation is only
 * possible if the status is "Open" (`"status": "200"`) or higher.
 *
 * Enshrined credit notes cannot be
 * changed. This operation cannot be undone.
 */
class CreditNoteEnshrine extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of the credit note to enshrine
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/enshrine";
    }
}
