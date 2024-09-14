<?php

namespace Lacodix\SevdeskSaloon\Requests\InvoicePos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoicePos
 *
 * There are a multitude of parameter which can be used to filter.
 */
class GetInvoicePos extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int|null $id Retrieve all InvoicePos with this InvoicePos id
     * @param float|int|null $invoiceid Retrieve all invoices positions with this invoice. Must be provided with invoice[objectName]
     * @param string|null $invoiceobjectName Only required if invoice[id] was provided. 'Invoice' should be used as value.
     * @param float|int|null $partid Retrieve all invoices positions with this part. Must be provided with part[objectName]
     * @param string|null $partobjectName Only required if part[id] was provided. 'Part' should be used as value.
     */
    public function __construct(
        protected ?int $id = null,
        protected ?int $invoiceid = null,
        protected ?string $invoiceobjectName = null,
        protected ?int $partid = null,
        protected ?string $partobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/InvoicePos';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'id' => $this->id,
            'invoice[id]' => $this->invoiceid,
            'invoice[objectName]' => $this->invoiceobjectName,
            'part[id]' => $this->partid,
            'part[objectName]' => $this->partobjectName,
        ]);
    }
}
