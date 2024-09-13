<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceResetToDraft
 *
 * Resets the status to "Draft" (`"status": "100"`).<br>
 * This is only possible if the invoice has the
 * status "Open" (`"status": "200"`).<br>
 * If it has a higher status use
 * [Invoice/{invoiceId}/resetToOpen](#tag/Invoice/operation/invoiceResetToOpen) first.
 *
 * This endpoint
 * cannot be used for recurring invoices (`"invoiceType": "WKR"`).<br>
 * Use
 * [Invoice/Factory/saveInvoice](#tag/Invoice/operation/createInvoiceByFactory) instead.
 */
class InvoiceResetToDraft extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $invoiceId ID of the invoice to reset
     */
    public function __construct(
        protected int $invoiceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/resetToDraft";
    }
}
