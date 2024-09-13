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
    public function getTransactions(
        ?int $checkAccountid,
        ?string $checkAccountobjectName,
        ?bool $isBooked,
        ?string $paymtPurpose,
        ?string $startDate,
        ?string $endDate,
        ?string $payeePayerName,
        ?bool $onlyCredit,
        ?bool $onlyDebit,
    ): Response {
        return $this->connector->send(new GetTransactions($checkAccountid, $checkAccountobjectName, $isBooked, $paymtPurpose, $startDate, $endDate, $payeePayerName, $onlyCredit, $onlyDebit));
    }

    public function createTransaction(): Response
    {
        return $this->connector->send(new CreateTransaction());
    }

    /**
     * @param int $checkAccountTransactionId ID of check account transaction
     */
    public function getCheckAccountTransactionById(int $checkAccountTransactionId): Response
    {
        return $this->connector->send(new GetCheckAccountTransactionById($checkAccountTransactionId));
    }

    /**
     * @param int $checkAccountTransactionId ID of check account to update transaction
     */
    public function updateCheckAccountTransaction(int $checkAccountTransactionId): Response
    {
        return $this->connector->send(new UpdateCheckAccountTransaction($checkAccountTransactionId));
    }

    /**
     * @param int $checkAccountTransactionId Id of check account transaction to delete
     */
    public function deleteCheckAccountTransaction(int $checkAccountTransactionId): Response
    {
        return $this->connector->send(new DeleteCheckAccountTransaction($checkAccountTransactionId));
    }

    /**
     * @param int $checkAccountTransactionId ID of the transaction to enshrine
     */
    public function checkAccountTransactionEnshrine(int $checkAccountTransactionId): Response
    {
        return $this->connector->send(new CheckAccountTransactionEnshrine($checkAccountTransactionId));
    }
}
