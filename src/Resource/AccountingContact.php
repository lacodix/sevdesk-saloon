<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\AccountingContact\CreateAccountingContact;
use Lacodix\SevdeskSaloon\Requests\AccountingContact\DeleteAccountingContact;
use Lacodix\SevdeskSaloon\Requests\AccountingContact\GetAccountingContact;
use Lacodix\SevdeskSaloon\Requests\AccountingContact\GetAccountingContactById;
use Lacodix\SevdeskSaloon\Requests\AccountingContact\UpdateAccountingContact;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class AccountingContact extends Resource
{
    public function get(?string $contactId = null, ?string $contactobjectName = null): array
    {
        return $this->connector->sevSend(new GetAccountingContact($contactId, $contactobjectName));
    }

    public function create(int $contactId, array $data): array
    {
        return $this->connector->sevSend(new CreateAccountingContact($contactId, $data));
    }

    public function getById(int $accountingContactId): array
    {
        return $this->connector->sevSend(new GetAccountingContactById($accountingContactId));
    }

    public function update(int $accountingContactId, array $data): array
    {
        return $this->connector->sevSend(new UpdateAccountingContact($accountingContactId, $data));
    }

    public function delete(int $accountingContactId): Response
    {
        return $this->connector->sevSend(new DeleteAccountingContact($accountingContactId));
    }
}
