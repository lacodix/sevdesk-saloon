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
    public function getLetterpapers(): array
    {
        return $this->connector->send(new GetLetterpapersWithThumb())->json()['letterpapers'];
    }

    public function getTemplates(?string $type): array
    {
        return $this->connector->send(new GetTemplates($type))->json()['templates'];
    }

    public function updateInvoiceTemplate(int $invoiceId, array $data): array
    {
        return $this->connector->sevSend(new UpdateInvoiceTemplate($invoiceId));
    }

    public function updateOrderTemplate(int $orderId, array $data): array
    {
        return $this->connector->sevSend(new UpdateOrderTemplate($orderId, $data));
    }

    public function updateCreditNoteTemplate(int $creditNoteId, array $data): array
    {
        return $this->connector->sevSend(new UpdateCreditNoteTemplate($creditNoteId, $data));
    }
}
