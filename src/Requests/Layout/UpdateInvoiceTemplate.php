<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateInvoiceTemplate
 *
 * Update an existing invoice template
 */
class UpdateInvoiceTemplate extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of invoice to update
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/changeParameter";
    }
}
