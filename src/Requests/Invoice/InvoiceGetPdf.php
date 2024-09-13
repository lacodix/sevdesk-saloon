<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceGetPdf
 *
 * Retrieves the pdf document of an invoice with additional metadata.
 */
class InvoiceGetPdf extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $invoiceId ID of invoice from which you want the pdf
     * @param bool|null $download If u want to download the pdf of the invoice.
     * @param bool|null $preventSendBy Defines if u want to send the invoice.
     */
    public function __construct(
        protected int $invoiceId,
        protected ?bool $download = null,
        protected ?bool $preventSendBy = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/getPdf";
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'preventSendBy' => $this->preventSendBy]);
    }
}
