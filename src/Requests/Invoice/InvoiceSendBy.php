<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * invoiceSendBy
 *
 * Marks an invoice as sent by a chosen send type.
 */
class InvoiceSendBy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of invoice to mark as sent
     */
    public function __construct(
        protected int $invoiceId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/sendBy";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
