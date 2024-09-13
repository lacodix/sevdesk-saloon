<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\OrderPos\DeleteOrderPos;
use Lacodix\SevdeskSaloon\Requests\OrderPos\GetOrderPositionById;
use Lacodix\SevdeskSaloon\Requests\OrderPos\GetOrderPositions;
use Lacodix\SevdeskSaloon\Requests\OrderPos\UpdateOrderPosition;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class OrderPos extends Resource
{
    /**
     * @param int $orderid Retrieve all order positions belonging to this order. Must be provided with voucher[objectName]
     * @param string $orderobjectName Only required if order[id] was provided. 'Order' should be used as value.
     */
    public function getOrderPositions(?int $orderid, ?string $orderobjectName): Response
    {
        return $this->connector->send(new GetOrderPositions($orderid, $orderobjectName));
    }

    /**
     * @param int $orderPosId ID of order position to return
     */
    public function getOrderPositionById(int $orderPosId): Response
    {
        return $this->connector->send(new GetOrderPositionById($orderPosId));
    }

    /**
     * @param int $orderPosId ID of order position to update
     */
    public function updateOrderPosition(int $orderPosId): Response
    {
        return $this->connector->send(new UpdateOrderPosition($orderPosId));
    }

    /**
     * @param int $orderPosId Id of order position resource to delete
     */
    public function deleteOrderPos(int $orderPosId): Response
    {
        return $this->connector->send(new DeleteOrderPos($orderPosId));
    }
}
