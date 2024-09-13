<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checkAccountTransactionEnshrine
 *
 * Sets the current date and time as a value for the property `enshrined`.<br>
 * This operation is only
 * possible if the status is "Linked" (`"status": "200"`) or higher.
 *
 * Linked invoices, credit notes or
 * vouchers cannot be changed when the transaction is enshrined.
 */
class CheckAccountTransactionEnshrine extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $checkAccountTransactionId ID of the transaction to enshrine
     */
    public function __construct(
        protected int $checkAccountTransactionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccountTransaction/{$this->checkAccountTransactionId}/enshrine";
    }
}
