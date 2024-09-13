<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * creditNoteGetPdf
 *
 * Retrieves the pdf document of a credit note with additional metadata.
 */
class CreditNoteGetPdf extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $creditNoteId ID of credit note from which you want the pdf
     * @param bool|null $download If u want to download the pdf of the credit note.
     * @param bool|null $preventSendBy Defines if u want to send the credit note.
     */
    public function __construct(
        protected int $creditNoteId,
        protected ?bool $download = null,
        protected ?bool $preventSendBy = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CreditNote/{$this->creditNoteId}/getPdf";
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'preventSendBy' => $this->preventSendBy]);
    }
}
