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
    public function get(?int $orderid = null, ?string $orderobjectName = null): array
    {
        return $this->connector->sevSend(new GetOrderPositions($orderid, $orderobjectName));
    }

    public function getById(int $orderPosId): array
    {
        return $this->connector->sevSend(new GetOrderPositionById($orderPosId));
    }

    public function update(int $orderPosId, array $data): array
    {
        return $this->connector->sevSend(new UpdateOrderPosition($orderPosId, $data));
    }
    
    public function delete(int $orderPosId): array
    {
        return $this->connector->sevSend(new DeleteOrderPos($orderPosId));
    }
}
