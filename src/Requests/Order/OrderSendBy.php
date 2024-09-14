<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orderSendBy
 *
 * Marks an order as sent by a chosen send type.
 */
class OrderSendBy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $orderId ID of order to mark as sent
     */
    public function __construct(
        protected int $orderId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/sendBy";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
