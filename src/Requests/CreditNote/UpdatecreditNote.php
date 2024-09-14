<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updatecreditNote
 *
 * Update a creditNote
 */
class UpdatecreditNote extends Request implements HasBody
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
        return "/CreditNote/{$this->creditNoteId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
