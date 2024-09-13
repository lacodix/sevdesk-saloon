<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderById
 *
 * Returns a single order
 */
class GetOrderById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $orderId ID of order to return
     */
    public function __construct(
        protected int $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}";
    }
}
