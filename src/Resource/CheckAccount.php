<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\CheckAccount\CreateCheckAccount;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\CreateClearingAccount;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\CreateFileImportAccount;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\DeleteCheckAccount;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\GetBalanceAtDate;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\GetCheckAccountById;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\GetCheckAccounts;
use Lacodix\SevdeskSaloon\Requests\CheckAccount\UpdateCheckAccount;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class CheckAccount extends Resource
{
    public function get(): array
    {
        return $this->connector->sevSend(new GetCheckAccounts());
    }

    /**
     * @deprecated
     */
    public function create(array $data): array
    {
        return $this->connector->sevSend(new CreateCheckAccount($data));
    }

    public function createFileImportAccount(array $data): array
    {
        return $this->connector->sevSend(new CreateFileImportAccount($data));
    }

    public function createClearingAccount(array $data): array
    {
        return $this->connector->sevSend(new CreateClearingAccount($data));
    }

    public function getById(int $checkAccountId): array
    {
        return $this->connector->sevSend(new GetCheckAccountById($checkAccountId));
    }

    public function update(int $checkAccountId, array $data): array
    {
        return $this->connector->sevSend(new UpdateCheckAccount($checkAccountId, $data));
    }

    public function delete(int $checkAccountId): array
    {
        return $this->connector->sevSend(new DeleteCheckAccount($checkAccountId));
    }

    public function getBalanceAtDate(int $checkAccountId, string $date): array
    {
        return $this->connector->sevSend(new GetBalanceAtDate($checkAccountId, $date));
    }
}
