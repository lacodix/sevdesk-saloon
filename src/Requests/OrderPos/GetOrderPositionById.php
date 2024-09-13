<?php

namespace Lacodix\SevdeskSaloon\Requests\OrderPos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderPositionById
 *
 * Returns a single order position
 */
class GetOrderPositionById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $orderPosId ID of order position to return
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
