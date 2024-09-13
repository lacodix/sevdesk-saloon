<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createInvoiceReminder
 *
 * Create an reminder from an invoice
 */
class CreateInvoiceReminder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $invoiceid the id of the invoice
     * @param string $invoiceobjectName Model name, which is 'Invoice'
     */
    public function __construct(
        protected int $invoiceid,
        protected string $invoiceobjectName,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice/Factory/createInvoiceReminder';
    }

    public function defaultQuery(): array
    {
        return array_filter(['invoice[id]' => $this->invoiceid, 'invoice[objectName]' => $this->invoiceobjectName]);
    }
}
