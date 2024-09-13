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
    public function getCheckAccounts(): Response
    {
        return $this->connector->send(new GetCheckAccounts());
    }

    public function createCheckAccount(): Response
    {
        return $this->connector->send(new CreateCheckAccount());
    }

    public function createFileImportAccount(): Response
    {
        return $this->connector->send(new CreateFileImportAccount());
    }

    public function createClearingAccount(): Response
    {
        return $this->connector->send(new CreateClearingAccount());
    }

    /**
     * @param int $checkAccountId ID of check account
     */
    public function getCheckAccountById(int $checkAccountId): Response
    {
        return $this->connector->send(new GetCheckAccountById($checkAccountId));
    }

    /**
     * @param int $checkAccountId ID of check account to update
     */
    public function updateCheckAccount(int $checkAccountId): Response
    {
        return $this->connector->send(new UpdateCheckAccount($checkAccountId));
    }

    /**
     * @param int $checkAccountId Id of check account to delete
     */
    public function deleteCheckAccount(int $checkAccountId): Response
    {
        return $this->connector->send(new DeleteCheckAccount($checkAccountId));
    }

    /**
     * @param int $checkAccountId ID of check account
     * @param string $date Only consider transactions up to this date at 23:59:59
     */
    public function getBalanceAtDate(int $checkAccountId, string $date): Response
    {
        return $this->connector->send(new GetBalanceAtDate($checkAccountId, $date));
    }
}
