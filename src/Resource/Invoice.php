<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Enums\SevSequenceObjectType;
use Lacodix\SevdeskSaloon\Requests\Invoice\BookInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\CancelInvoice;
use Lacodix\SevdeskSaloon\Requests\Invoice\CreateInvoice;
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
use Lacodix\SevdeskSaloon\Requests\SevSequence\GetSevSequenceByType;
use Lacodix\SevdeskSaloon\Resource;

class Invoice extends Resource
{
    public function getNextSequeceNumber(string $type = 'RE')
    {
        return $this->connector->sevSend(new GetSevSequenceByType(SevSequenceObjectType::INVOICE->value, $type));
    }

    /**
     * @param int $status Status of the invoices
     * @param string $invoiceNumber Retrieve all invoices with this invoice number
     * @param int $startDate Retrieve all invoices with a date equal or higher
     * @param int $endDate Retrieve all invoices with a date equal or lower
     * @param int $contactid Retrieve all invoices with this contact. Must be provided with contact[objectName]
     * @param string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function get(
        ?int $status = null,
        ?string $invoiceNumber = null,
        ?int $startDate = null,
        ?int $endDate = null,
        ?int $contactid = null,
        ?string $contactobjectName = null,
    ): array {
        return $this->connector->sevSend(new GetInvoices($status, $invoiceNumber, $startDate, $endDate, $contactid, $contactobjectName));
    }

    public function create(int $contactId, array $data): array
    {
        return $this->connector->sevSend(new CreateInvoice($contactId, $data));
    }

    public function getById(int $invoiceId): array
    {
        return $this->connector->sevSend(new GetInvoiceById($invoiceId));
    }

    public function getPositions(int $invoiceId, ?int $limit = null, ?int $offset = null, ?array $embed = null): array
    {
        return $this->connector->sevSend(new GetInvoicePositionsById($invoiceId, $limit, $offset, $embed));
    }

    public function createFromOrder(int $orderId, array $data): array
    {
        return $this->connector->sevSend(new CreateInvoiceFromOrder($orderId, $data));
    }

    public function createReminder(int $invoiceid): array
    {
        return $this->connector->sevSend(new CreateInvoiceReminder($invoiceid));
    }

    public function isPartiallyPaid(int $invoiceId): array
    {
        return $this->connector->sevSend(new GetIsInvoicePartiallyPaid($invoiceId));
    }

    public function cancel(int $invoiceId): array
    {
        return $this->connector->sevSend(new CancelInvoice($invoiceId));
    }

    public function render(int $invoiceId, array $data = []): array
    {
        return $this->connector->sevSend(new InvoiceRender($invoiceId, $data));
    }

    public function sendViaEmail(int $invoiceId, array $data): array
    {
        return $this->connector->sevSend(new SendInvoiceViaEmail($invoiceId, $data));
    }

    public function getPdf(int $invoiceId, ?bool $download = null, ?bool $preventSendBy = null): array
    {
        return $this->connector->send(new InvoiceGetPdf($invoiceId, $download, $preventSendBy))->json();
    }

    public function sendBy(int $invoiceId, array $data): array
    {
        return $this->connector->sevSend(new InvoiceSendBy($invoiceId, $data));
    }

    public function enshrine(int $invoiceId): array
    {
        return $this->connector->sevSend(new InvoiceEnshrine($invoiceId));
    }

    public function book(int $invoiceId, array $data): array
    {
        return $this->connector->sevSend(new BookInvoice($invoiceId, $data));
    }

    public function resetToOpen(int $invoiceId): array
    {
        return $this->connector->sevSend(new InvoiceResetToOpen($invoiceId));
    }

    public function resetToDraft(int $invoiceId): array
    {
        return $this->connector->sevSend(new InvoiceResetToDraft($invoiceId));
    }
}
