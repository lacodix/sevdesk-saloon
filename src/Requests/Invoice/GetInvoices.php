<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoices
 *
 * There are a multitude of parameter which can be used to filter. A few of them are attached but
 *
 * for a complete list please check out <a
 * href='#tag/Invoice/How-to-filter-for-certain-invoices'>this</a> list
 */
class GetInvoices extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int|null $status Status of the invoices
     * @param string|null $invoiceNumber Retrieve all invoices with this invoice number
     * @param int|null $startDate Retrieve all invoices with a date equal or higher
     * @param int|null $endDate Retrieve all invoices with a date equal or lower
     * @param int|null $contactid Retrieve all invoices with this contact. Must be provided with contact[objectName]
     * @param string|null $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function __construct(
        protected float|int|null $status = null,
        protected ?string $invoiceNumber = null,
        protected ?int $startDate = null,
        protected ?int $endDate = null,
        protected ?int $contactid = null,
        protected ?string $contactobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'status' => $this->status,
            'invoiceNumber' => $this->invoiceNumber,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'contact[id]' => $this->contactid,
            'contact[objectName]' => $this->contactobjectName,
        ]);
    }
}
