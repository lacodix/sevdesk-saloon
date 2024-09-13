<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getOrders
 *
 * There are a multitude of parameter which can be used to filter. A few of them are attached but
 *
 * for a complete list please check out <a href='#tag/Order/How-to-filter-for-certain-orders'>this</a>
 * list
 */
class GetOrders extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $status Status of the order
     * @param string|null $orderNumber Retrieve all orders with this order number
     * @param int|null $startDate Retrieve all orders with a date equal or higher
     * @param int|null $endDate Retrieve all orders with a date equal or lower
     * @param int|null $contactid Retrieve all orders with this contact. Must be provided with contact[objectName]
     * @param string|null $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function __construct(
        protected ?int $status = null,
        protected ?string $orderNumber = null,
        protected ?int $startDate = null,
        protected ?int $endDate = null,
        protected ?int $contactid = null,
        protected ?string $contactobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Order';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'status' => $this->status,
            'orderNumber' => $this->orderNumber,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'contact[id]' => $this->contactid,
            'contact[objectName]' => $this->contactobjectName,
        ]);
    }
}
