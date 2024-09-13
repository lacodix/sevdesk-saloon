<?php

namespace Lacodix\SevdeskSaloon\Requests\OrderPos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteOrderPos
 */
class DeleteOrderPos extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $orderPosId Id of order position resource to delete
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
