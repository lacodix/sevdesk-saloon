<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteOrder
 */
class DeleteOrder extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $orderId Id of order resource to delete
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
