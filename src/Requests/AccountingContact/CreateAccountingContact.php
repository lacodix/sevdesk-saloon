<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createAccountingContact
 *
 * Creates a new accounting contact.
 */
class CreateAccountingContact extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/AccountingContact';
    }
}
