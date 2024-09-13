<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCheckAccountTransaction
 */
class DeleteCheckAccountTransaction extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $checkAccountTransactionId Id of check account transaction to delete
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
