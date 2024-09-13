<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceEnshrine
 *
 * Sets the current date and time as a value for the property `enshrined`.<br>
 * This operation is only
 * possible if the status is "Open" (`"status": "200"`) or higher.
 *
 * Enshrined invoices cannot be
 * changed. This operation cannot be undone.
 */
class InvoiceEnshrine extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of the invoice to enshrine
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/enshrine";
    }
}
