<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteSendBy
 *
 * Marks an credit note as sent by a chosen send type.
 */
class CreditNoteSendBy extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of credit note to mark as sent
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/sendBy";
    }
}
