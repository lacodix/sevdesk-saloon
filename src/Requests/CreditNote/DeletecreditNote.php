<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deletecreditNote
 */
class DeletecreditNote extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $creditNoteId Id of creditNote resource to delete
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
