<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\InvoicePos\GetInvoicePos;
use Lacodix\SevdeskSaloon\Resource;

class InvoicePos extends Resource
{
    /**
     * @param int $id Retrieve all InvoicePos with this InvoicePos id
     * @param int $invoiceid Retrieve all invoices positions with this invoice. Must be provided with invoice[objectName]
     * @param string $invoiceobjectName Only required if invoice[id] was provided. 'Invoice' should be used as value.
     * @param int $partid Retrieve all invoices positions with this part. Must be provided with part[objectName]
     * @param string $partobjectName Only required if part[id] was provided. 'Part' should be used as value.
     */
    public function get(
        ?int $id = null,
        ?int $invoiceid = null,
        ?string $invoiceobjectName = null,
        ?int $partid = null,
        ?string $partobjectName = null,
    ): array {
        return $this->connector->sevSend(new GetInvoicePos($id, $invoiceid, $invoiceobjectName, $partid, $partobjectName));
    }
}
