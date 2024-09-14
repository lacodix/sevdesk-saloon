<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createOrder
 *
 * Creates an order to which positions can be added later.
 */
class CreateOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $contactId,
        protected array $data
    ) {
        $this->data['contact'] = [
            'id' => $contactId,
            'objectName' => 'Contact',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/Order/Factory/saveOrder';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
