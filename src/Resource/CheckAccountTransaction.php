<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\CheckAccountTransactionEnshrine;
use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\CreateTransaction;
use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\DeleteCheckAccountTransaction;
use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\GetCheckAccountTransactionById;
use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\GetTransactions;
use Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction\UpdateCheckAccountTransaction;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class CheckAccountTransaction extends Resource
{
    /**
     * @param int $checkAccountid Retrieve all transactions on this check account. Must be provided with checkAccount[objectName]
     * @param string $checkAccountobjectName Only required if checkAccount[id] was provided. 'CheckAccount' should be used as value.
     * @param bool $isBooked Only retrieve booked transactions
     * @param string $paymtPurpose Only retrieve transactions with this payment purpose
     * @param string $startDate Only retrieve transactions from this date on
     * @param string $endDate Only retrieve transactions up to this date
     * @param string $payeePayerName Only retrieve transactions with this payee / payer
     * @param bool $onlyCredit Only retrieve credit transactions
     * @param bool $onlyDebit Only retrieve debit transactions
     */
    public function get(
        ?int $checkAccountid = null,
        ?string $checkAccountobjectName = null,
        ?bool $isBooked = null,
        ?string $paymtPurpose = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?string $payeePayerName = null,
        ?bool $onlyCredit = null,
        ?bool $onlyDebit = null,
    ): array {
        return $this->connector->sevSend(new GetTransactions($checkAccountid, $checkAccountobjectName, $isBooked, $paymtPurpose, $startDate, $endDate, $payeePayerName, $onlyCredit, $onlyDebit));
    }

    public function create(int $checkAccountId, array $data): array
    {
        return $this->connector->sevSend(new CreateTransaction($checkAccountId, $data));
    }

    public function getById(int $checkAccountTransactionId): array
    {
        return $this->connector->sevSend(new GetCheckAccountTransactionById($checkAccountTransactionId));
    }

    public function update(int $checkAccountTransactionId, array $data): array
    {
        return $this->connector->sevSend(new UpdateCheckAccountTransaction($checkAccountTransactionId, $data));
    }

    public function delete(int $checkAccountTransactionId): array
    {
        return $this->connector->sevSend(new DeleteCheckAccountTransaction($checkAccountTransactionId));
    }

    public function enshrine(int $checkAccountTransactionId): array
    {
        return $this->connector->sevSend(new CheckAccountTransactionEnshrine($checkAccountTransactionId));
    }
}
