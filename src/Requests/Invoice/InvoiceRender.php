<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * invoiceRender
 *
 * Using this endpoint you can render the pdf document of an invoice.<br>
 *      Use cases for this are
 * the retrieval of the pdf location or the forceful re-render of a already sent invoice.<br>
 *
 * Please be aware that changing an invoice after it has been sent to a customer is not an allowed
 * bookkeeping process.
 */
class InvoiceRender extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $invoiceId ID of invoice to render
     */
    public function __construct(
        protected int $invoiceId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/render";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
