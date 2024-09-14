<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Enums\SevSequenceObjectType;
use Lacodix\SevdeskSaloon\Requests\CreditNote\BookCreditNote;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreateCreditNote;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreateCreditNoteFromInvoice;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreateCreditNoteFromVoucher;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreditNoteEnshrine;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreditNoteGetPdf;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreditNoteResetToDraft;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreditNoteResetToOpen;
use Lacodix\SevdeskSaloon\Requests\CreditNote\CreditNoteSendBy;
use Lacodix\SevdeskSaloon\Requests\CreditNote\DeletecreditNote;
use Lacodix\SevdeskSaloon\Requests\CreditNote\GetcreditNoteById;
use Lacodix\SevdeskSaloon\Requests\CreditNote\GetCreditNotes;
use Lacodix\SevdeskSaloon\Requests\CreditNote\SendCreditNoteByPrinting;
use Lacodix\SevdeskSaloon\Requests\CreditNote\SendCreditNoteViaEmail;
use Lacodix\SevdeskSaloon\Requests\CreditNote\UpdatecreditNote;
use Lacodix\SevdeskSaloon\Requests\SevSequence\GetSevSequenceByType;
use Lacodix\SevdeskSaloon\Resource;

class CreditNote extends Resource
{
    public function getNextSequeceNumber(string $type = 'CN')
    {
        return $this->connector->sevSend(new GetSevSequenceByType(SevSequenceObjectType::CREDIT_NOTE->value, $type));
    }

    public function get(
        ?string $status = null,
        ?string $creditNoteNumber = null,
        ?int $startDate = null,
        ?int $endDate = null,
        ?int $contactid = null,
        ?string $contactobjectName = null,
    ): array {
        return $this->connector->sevSend(new GetCreditNotes($status, $creditNoteNumber, $startDate, $endDate, $contactid, $contactobjectName));
    }

    public function create(int $contactId, array $items, array $data): array
    {
        return $this->connector->sevSend(new CreateCreditNote($contactId, $items, $data));
    }

    public function createFromInvoice(int $invoiceId): array
    {
        return $this->connector->sevSend(new CreateCreditNoteFromInvoice($invoiceId));
    }

    public function createFromVoucher($voucherId): array
    {
        return $this->connector->sevSend(new CreateCreditNoteFromVoucher($voucherId));
    }

    public function getById(int $creditNoteId): array
    {
        return $this->connector->sevSend(new GetcreditNoteById($creditNoteId));
    }

    public function update(int $creditNoteId, array $data): array
    {
        return $this->connector->sevSend(new UpdatecreditNote($creditNoteId, $data));
    }

    public function delete(int $creditNoteId): array
    {
        return $this->connector->sevSend(new DeletecreditNote($creditNoteId));
    }

    public function sendByPrinting(int $creditNoteId, string $sendType): array
    {
        return $this->connector->sevSend(new SendCreditNoteByPrinting($creditNoteId, $sendType));
    }

    public function sendBy(int $creditNoteId, array $data): array
    {
        return $this->connector->sevSend(new CreditNoteSendBy($creditNoteId, $data));
    }

    public function enshrine(int $creditNoteId): array
    {
        return $this->connector->sevSend(new CreditNoteEnshrine($creditNoteId));
    }

    public function getPdf(int $creditNoteId, ?bool $download = null, ?bool $preventSendBy = null): array
    {
        return $this->connector->send(new CreditNoteGetPdf($creditNoteId, $download, $preventSendBy))->json();
    }

    public function sendViaEmail(int $creditNoteId, array $data): array
    {
        return $this->connector->sevSend(new SendCreditNoteViaEmail($creditNoteId, $data));
    }

    public function book(int $creditNoteId, array $data): array
    {
        return $this->connector->sevSend(new BookCreditNote($creditNoteId, $data));
    }

    public function resetToOpen(int $creditNoteId): array
    {
        return $this->connector->sevSend(new CreditNoteResetToOpen($creditNoteId));
    }

    public function resetToDraft(int $creditNoteId): array
    {
        return $this->connector->sevSend(new CreditNoteResetToDraft($creditNoteId));
    }
}
