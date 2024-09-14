<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateInvoiceTemplate
 *
 * Update an existing invoice template
 */
class UpdateInvoiceTemplate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of invoice to update
     */
    public function __construct(
        protected int $invoiceId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/changeParameter";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
