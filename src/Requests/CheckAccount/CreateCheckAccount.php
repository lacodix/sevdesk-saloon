<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCheckAccount
 *
 * Creates a new banking account on which transactions can be created.
 */
class CreateCheckAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccount';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
