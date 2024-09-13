<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateCreditNoteTemplate
 *
 * Update an existing of credit note template
 */
class UpdateCreditNoteTemplate extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of credit note to update
     */
    public function __construct(
        protected int $creditNoteId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/changeParameter";
    }
}
