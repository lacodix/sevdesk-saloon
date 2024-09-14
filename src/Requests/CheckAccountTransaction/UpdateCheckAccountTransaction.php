<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCheckAccountTransaction
 *
 * Update a check account transaction
 */
class UpdateCheckAccountTransaction extends Request implements HasBody
{
    use HasJsonBody;
    
    protected Method $method = Method::PUT;

    /**
     * @param int $checkAccountTransactionId ID of check account to update transaction
     */
    public function __construct(
        protected int $checkAccountTransactionId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccountTransaction/{$this->checkAccountTransactionId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
