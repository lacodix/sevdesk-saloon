<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccountTransaction;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createTransaction
 *
 * Creates a new transaction on a check account.
 */
class CreateTransaction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccountTransaction';
    }
}
