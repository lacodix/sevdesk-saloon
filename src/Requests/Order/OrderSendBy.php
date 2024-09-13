<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orderSendBy
 *
 * Marks an order as sent by a chosen send type.
 */
class OrderSendBy extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $orderId ID of order to mark as sent
     */
    public function __construct(
        protected int $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/sendBy";
    }
}
