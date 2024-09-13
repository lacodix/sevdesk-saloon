<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createFileImportAccount
 *
 * Creates a new banking account for file imports (CSV, MT940).
 */
class CreateFileImportAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccount/Factory/fileImportAccount';
    }
}
