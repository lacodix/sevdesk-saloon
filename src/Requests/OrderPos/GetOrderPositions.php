<?php

namespace Lacodix\SevdeskSaloon\Requests\OrderPos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderPositions
 *
 * Retrieve all order positions depending on the filters defined in the query.
 */
class GetOrderPositions extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $orderid Retrieve all order positions belonging to this order. Must be provided with voucher[objectName]
     * @param string|null $orderobjectName Only required if order[id] was provided. 'Order' should be used as value.
     */
    public function __construct(
        protected ?int $orderid = null,
        protected ?string $orderobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/OrderPos';
    }

    public function defaultQuery(): array
    {
        return array_filter(['order[id]' => $this->orderid, 'order[objectName]' => $this->orderobjectName]);
    }
}
