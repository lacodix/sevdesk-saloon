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

    public function __construct(
        protected int $checkAccountId,
        protected array $data
    ) {
        $this->data['checkAccount'] = [
            'id' => $checkAccountId,
            'objectName' => 'CheckAccount',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/CheckAccountTransaction';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
