<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * creditNoteSendBy
 *
 * Marks an credit note as sent by a chosen send type.
 */
class CreditNoteSendBy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $creditNoteId ID of credit note to mark as sent
     */
    public function __construct(
        protected int $creditNoteId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/sendBy";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
