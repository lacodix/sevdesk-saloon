<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrderPositionsById
 *
 * Returns all positions of an order
 */
class GetOrderPositionsById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $orderId ID of order to return the positions
     * @param int|null $limit limits the number of entries returned
     * @param int|null $offset set the index where the returned entries start
     * @param array|null $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function __construct(
        protected int $orderId,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?array $embed = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/getPositions";
    }

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'offset' => $this->offset, 'embed' => $this->embed]);
    }
}
