<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCheckAccounts
 *
 * Retrieve all check accounts
 */
class GetCheckAccounts extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccount';
    }
}
