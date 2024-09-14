<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCreditNoteTemplate
 *
 * Update an existing of credit note template
 */
class UpdateCreditNoteTemplate extends Request
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of creditNote to update
     */
    public function __construct(
        protected int $creditNoteId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/changeParameter";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
