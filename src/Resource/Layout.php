<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Layout\GetLetterpapersWithThumb;
use Lacodix\SevdeskSaloon\Requests\Layout\GetTemplates;
use Lacodix\SevdeskSaloon\Requests\Layout\UpdateCreditNoteTemplate;
use Lacodix\SevdeskSaloon\Requests\Layout\UpdateInvoiceTemplate;
use Lacodix\SevdeskSaloon\Requests\Layout\UpdateOrderTemplate;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Layout extends Resource
{
    public function getLetterpapersWithThumb(): Response
    {
        return $this->connector->send(new GetLetterpapersWithThumb());
    }

    /**
     * @param string $type Type of the templates you want to get.
     */
    public function getTemplates(?string $type): Response
    {
        return $this->connector->send(new GetTemplates($type));
    }

    /**
     * @param int $invoiceId ID of invoice to update
     */
    public function updateInvoiceTemplate(int $invoiceId): Response
    {
        return $this->connector->send(new UpdateInvoiceTemplate($invoiceId));
    }

    /**
     * @param int $orderId ID of order to update
     */
    public function updateOrderTemplate(int $orderId): Response
    {
        return $this->connector->send(new UpdateOrderTemplate($orderId));
    }

    /**
     * @param int $creditNoteId ID of credit note to update
     */
    public function updateCreditNoteTemplate(int $creditNoteId): Response
    {
        return $this->connector->send(new UpdateCreditNoteTemplate($creditNoteId));
    }
}
