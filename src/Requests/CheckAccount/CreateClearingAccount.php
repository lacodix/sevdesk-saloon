<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createClearingAccount
 *
 * Creates a new clearing account.
 */
class CreateClearingAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccount/Factory/clearingAccount';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
