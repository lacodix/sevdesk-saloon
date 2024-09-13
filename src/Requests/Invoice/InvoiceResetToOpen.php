<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * invoiceResetToOpen
 *
 * Resets the status "Open" (`"status": "200"`). Linked transactions will be unlinked.<br>
 * This is not
 * possible if the invoice itself or one of its transactions (CheckAccountTransaction) is already
 * enshrined.
 *
 * This endpoint cannot be used to increase the status to "Open" (`"status":
 * "200"`).<br>
 * Use [Invoice/{invoiceId}/sendBy](#tag/Invoice/operation/invoiceSendBy) /
 * [Invoice/{invoiceId}/sendViaEmail](#tag/Invoice/operation/sendInvoiceViaEMail) instead.
 *
 * This
 * endpoint cannot be used for recurring invoices (`"invoiceType": "WKR"`).
 * Use
 * [Invoice/Factory/saveInvoice](#tag/Invoice/operation/createInvoiceByFactory) instead.
 */
class InvoiceResetToOpen extends Request
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
        return "/Invoice/{$this->invoiceId}/resetToOpen";
    }
}
