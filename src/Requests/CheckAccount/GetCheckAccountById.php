<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCheckAccountById
 *
 * Retrieve an existing check account
 */
class GetCheckAccountById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $checkAccountId ID of check account
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
