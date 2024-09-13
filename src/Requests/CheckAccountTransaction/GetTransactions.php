<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTransactions
 *
 * Retrieve all transactions depending on the filters defined in the query.
 */
class GetTransactions extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $checkAccountid Retrieve all transactions on this check account. Must be provided with checkAccount[objectName]
     * @param string|null $checkAccountobjectName Only required if checkAccount[id] was provided. 'CheckAccount' should be used as value.
     * @param bool|null $isBooked Only retrieve booked transactions
     * @param string|null $paymtPurpose Only retrieve transactions with this payment purpose
     * @param string|null $startDate Only retrieve transactions from this date on
     * @param string|null $endDate Only retrieve transactions up to this date
     * @param string|null $payeePayerName Only retrieve transactions with this payee / payer
     * @param bool|null $onlyCredit Only retrieve credit transactions
     * @param bool|null $onlyDebit Only retrieve debit transactions
     */
    public function __construct(
        protected ?int $checkAccountid = null,
        protected ?string $checkAccountobjectName = null,
        protected ?bool $isBooked = null,
        protected ?string $paymtPurpose = null,
        protected ?string $startDate = null,
        protected ?string $endDate = null,
        protected ?string $payeePayerName = null,
        protected ?bool $onlyCredit = null,
        protected ?bool $onlyDebit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccountTransaction';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'checkAccount[id]' => $this->checkAccountid,
            'checkAccount[objectName]' => $this->checkAccountobjectName,
            'isBooked' => $this->isBooked,
            'paymtPurpose' => $this->paymtPurpose,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'payeePayerName' => $this->payeePayerName,
            'onlyCredit' => $this->onlyCredit,
            'onlyDebit' => $this->onlyDebit,
        ]);
    }
}
