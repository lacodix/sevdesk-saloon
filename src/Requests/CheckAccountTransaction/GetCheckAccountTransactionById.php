<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCheckAccountTransactionById
 *
 * Retrieve an existing check account transaction
 */
class GetCheckAccountTransactionById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $checkAccountTransactionId ID of check account transaction
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
