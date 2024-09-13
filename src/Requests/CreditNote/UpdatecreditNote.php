<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updatecreditNote
 *
 * Update a creditNote
 */
class UpdatecreditNote extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of creditNote to update
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}";
    }
}
