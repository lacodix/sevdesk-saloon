<?php

namespace Lacodix\SevdeskSaloon\Requests\OrderPos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateOrderPosition
 *
 * Update an order position
 */
class UpdateOrderPosition extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $orderPosId ID of order position to update
     */
    public function __construct(
        protected int $orderPosId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/OrderPos/{$this->orderPosId}";
    }
}
