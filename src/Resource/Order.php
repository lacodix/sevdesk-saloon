<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Order\CreateContractNoteFromOrder;
use Lacodix\SevdeskSaloon\Requests\Order\CreateOrder;
use Lacodix\SevdeskSaloon\Requests\Order\CreatePackingListFromOrder;
use Lacodix\SevdeskSaloon\Requests\Order\DeleteOrder;
use Lacodix\SevdeskSaloon\Requests\Order\GetDiscounts;
use Lacodix\SevdeskSaloon\Requests\Order\GetOrderById;
use Lacodix\SevdeskSaloon\Requests\Order\GetOrderPositionsById;
use Lacodix\SevdeskSaloon\Requests\Order\GetOrders;
use Lacodix\SevdeskSaloon\Requests\Order\GetRelatedObjects;
use Lacodix\SevdeskSaloon\Requests\Order\OrderGetPdf;
use Lacodix\SevdeskSaloon\Requests\Order\OrderSendBy;
use Lacodix\SevdeskSaloon\Requests\Order\SendorderViaEmail;
use Lacodix\SevdeskSaloon\Requests\Order\UpdateOrder;
use Lacodix\SevdeskSaloon\Resource;

class Order extends Resource
{
    /**
     * @param int $status Status of the order
     * @param string $orderNumber Retrieve all orders with this order number
     * @param int $startDate Retrieve all orders with a date equal or higher
     * @param int $endDate Retrieve all orders with a date equal or lower
     * @param int $contactid Retrieve all orders with this contact. Must be provided with contact[objectName]
     * @param string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function get(
        ?int $status = null,
        ?string $orderNumber = null,
        ?int $startDate = null,
        ?int $endDate = null,
        ?int $contactid = null,
        ?string $contactobjectName = null,
    ): array {
        return $this->connector->sevSend(new GetOrders($status, $orderNumber, $startDate, $endDate, $contactid, $contactobjectName));
    }

    public function create(int $contactId, array $items, array $data): array
    {
        return $this->connector->sevSend(new CreateOrder($contactId, $items, $data));
    }

    public function getById(int $orderId): array
    {
        return $this->connector->sevSend(new GetOrderById($orderId));
    }

    public function update(int $orderId, array $data): array
    {
        return $this->connector->sevSend(new UpdateOrder($orderId, $data));
    }

    public function delete(int $orderId): array
    {
        return $this->connector->sevSend(new DeleteOrder($orderId));
    }

    public function getPositions(int $orderId, ?int $limit = null, ?int $offset = null, ?array $embed = null): array
    {
        return $this->connector->sevSend(new GetOrderPositionsById($orderId, $limit, $offset, $embed));
    }

    public function getDiscounts(int $orderId, ?int $limit = null, ?int $offset = null, ?array $embed = null): array
    {
        return $this->connector->sevSend(new GetDiscounts($orderId, $limit, $offset, $embed));
    }

    public function getRelatedObjects(int $orderId, ?bool $includeItself = null, ?bool $sortByType = null, ?array $embed = null): array
    {
        return $this->connector->sevSend(new GetRelatedObjects($orderId, $includeItself, $sortByType, $embed));
    }

    public function sendViaEmail(int $orderId, array $data): array
    {
        return $this->connector->sevSend(new SendorderViaEmail($orderId, $data));
    }

    public function createPackingListFromOrder(int $orderId): array
    {
        return $this->connector->sevSend(new CreatePackingListFromOrder($orderId));
    }

    public function createContractNoteFromOrder(int $orderId): array
    {
        return $this->connector->sevSend(new CreateContractNoteFromOrder($orderId));
    }

    public function getPdf(int $orderId, ?bool $download = null, ?bool $preventSendBy = null): array
    {
        return $this->connector->send(new OrderGetPdf($orderId, $download, $preventSendBy))->json();
    }

    public function sendBy(int $orderId, array $data): array
    {
        return $this->connector->sevSend(new OrderSendBy($orderId, $data));
    }
}
