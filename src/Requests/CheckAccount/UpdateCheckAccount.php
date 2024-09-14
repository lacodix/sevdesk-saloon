<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateCheckAccount
 *
 * Update a check account
 */
class UpdateCheckAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $checkAccountId ID of check account to update
     */
    public function __construct(
        protected int $checkAccountId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccount/{$this->checkAccountId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
