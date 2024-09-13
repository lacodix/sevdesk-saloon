<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateCheckAccountTransaction
 *
 * Update a check account transaction
 */
class UpdateCheckAccountTransaction extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $checkAccountTransactionId ID of check account to update transaction
     */
    public function __construct(
        protected int $checkAccountTransactionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccountTransaction/{$this->checkAccountTransactionId}";
    }
}
