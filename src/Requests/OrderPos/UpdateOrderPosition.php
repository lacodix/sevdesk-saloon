<?php

namespace Lacodix\SevdeskSaloon\Requests\OrderPos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateOrderPosition
 *
 * Update an order position
 */
class UpdateOrderPosition extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $orderPosId ID of order position to update
     */
    public function __construct(
        protected int $orderPosId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/OrderPos/{$this->orderPosId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
