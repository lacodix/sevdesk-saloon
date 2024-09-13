<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Invoice\BookInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\CancelInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoiceByFactory;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoiceFromOrder;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoiceReminder;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetInvoiceById;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetInvoicePositionsById;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetInvoices;
use Lacodix\SevdeskSaloon\Requests\Invoice\GetIsInvoicePartiallyPaid;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceEnshrine;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceGetPdf;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceRender;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceResetToDraft;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceResetToOpen;
use Lacodix\SevdeskSaloon\Requests\Invoice\InvoiceSendBy;
use Lacodix\SevdeskSaloon\Requests\Invoice\SendInvoiceViaEmail;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Invoice extends Resource
{
    /**
     * @param float|int $status Status of the invoices
     * @param string $invoiceNumber Retrieve all invoices with this invoice number
     * @param int $startDate Retrieve all invoices with a date equal or higher
     * @param int $endDate Retrieve all invoices with a date equal or lower
     * @param int $contactid Retrieve all invoices with this contact. Must be provided with contact[objectName]
     * @param string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function getInvoices(
        float|int|null $status = null,
        ?string $invoiceNumber = null,
        ?int $startDate = null,
        ?int $endDate = null,
        ?int $contactid = null,
        ?string $contactobjectName = null,
    ): Response {
        return $this->connector->send(new GetInvoices($status, $invoiceNumber, $startDate, $endDate, $contactid, $contactobjectName));
    }

    public function createInvoiceByFactory(): Response
    {
        return $this->connector->send(new CreateInvoiceByFactory());
    }

    /**
     * @param int $invoiceId ID of invoice to return
     */
    public function getInvoiceById(int $invoiceId): Response
    {
        return $this->connector->send(new GetInvoiceById($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice to return the positions
     * @param int $limit limits the number of entries returned
     * @param int $offset set the index where the returned entries start
     * @param array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function getInvoicePositionsById(int $invoiceId, ?int $limit, ?int $offset, ?array $embed): Response
    {
        return $this->connector->send(new GetInvoicePositionsById($invoiceId, $limit, $offset, $embed));
    }

    public function createInvoiceFromOrder(): Response
    {
        return $this->connector->send(new CreateInvoiceFromOrder());
    }

    /**
     * @param int $invoiceid the id of the invoice
     * @param string $invoiceobjectName Model name, which is 'Invoice'
     */
    public function createInvoiceReminder(int $invoiceid, string $invoiceobjectName): Response
    {
        return $this->connector->send(new CreateInvoiceReminder($invoiceid, $invoiceobjectName));
    }

    /**
     * @param int $invoiceId ID of invoice to return
     */
    public function getIsInvoicePartiallyPaid(int $invoiceId): Response
    {
        return $this->connector->send(new GetIsInvoicePartiallyPaid($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice to be cancelled
     */
    public function cancelInvoice(int $invoiceId): Response
    {
        return $this->connector->send(new CancelInvoice($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice to render
     */
    public function invoiceRender(int $invoiceId): Response
    {
        return $this->connector->send(new InvoiceRender($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice to be sent via email
     */
    public function sendInvoiceViaEmail(int $invoiceId): Response
    {
        return $this->connector->send(new SendInvoiceViaEmail($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice from which you want the pdf
     * @param bool $download If u want to download the pdf of the invoice.
     * @param bool $preventSendBy Defines if u want to send the invoice.
     */
    public function invoiceGetPdf(int $invoiceId, ?bool $download, ?bool $preventSendBy): Response
    {
        return $this->connector->send(new InvoiceGetPdf($invoiceId, $download, $preventSendBy));
    }

    /**
     * @param int $invoiceId ID of invoice to mark as sent
     */
    public function invoiceSendBy(int $invoiceId): Response
    {
        return $this->connector->send(new InvoiceSendBy($invoiceId));
    }

    /**
     * @param int $invoiceId ID of the invoice to enshrine
     */
    public function invoiceEnshrine(int $invoiceId): Response
    {
        return $this->connector->send(new InvoiceEnshrine($invoiceId));
    }

    /**
     * @param int $invoiceId ID of invoice to book
     */
    public function bookInvoice(int $invoiceId): Response
    {
        return $this->connector->send(new BookInvoice($invoiceId));
    }

    /**
     * @param int $invoiceId ID of the invoice to reset
     */
    public function invoiceResetToOpen(int $invoiceId): Response
    {
        return $this->connector->send(new InvoiceResetToOpen($invoiceId));
    }

    /**
     * @param int $invoiceId ID of the invoice to reset
     */
    public function invoiceResetToDraft(int $invoiceId): Response
    {
        return $this->connector->send(new InvoiceResetToDraft($invoiceId));
    }
}
