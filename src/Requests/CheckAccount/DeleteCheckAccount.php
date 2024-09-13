<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCheckAccount
 */
class DeleteCheckAccount extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $checkAccountId Id of check account to delete
     */
    public function __construct(
        protected int $checkAccountId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccount/{$this->checkAccountId}";
    }
}
