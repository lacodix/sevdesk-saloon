<?php

namespace Lacodix\SevdeskSaloon\Requests\AccountingContact;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAccountingContact extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $accountingContactId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/AccountingContact/{$this->accountingContactId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
