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
use Saloon\Http\Response;

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
    public function getOrders(
        ?int $status,
        ?string $orderNumber,
        ?int $startDate,
        ?int $endDate,
        ?int $contactid,
        ?string $contactobjectName,
    ): Response {
        return $this->connector->send(new GetOrders($status, $orderNumber, $startDate, $endDate, $contactid, $contactobjectName));
    }

    public function createOrder(): Response
    {
        return $this->connector->send(new CreateOrder());
    }

    /**
     * @param int $orderId ID of order to return
     */
    public function getOrderById(int $orderId): Response
    {
        return $this->connector->send(new GetOrderById($orderId));
    }

    /**
     * @param int $orderId ID of order to update
     */
    public function updateOrder(int $orderId): Response
    {
        return $this->connector->send(new UpdateOrder($orderId));
    }

    /**
     * @param int $orderId Id of order resource to delete
     */
    public function deleteOrder(int $orderId): Response
    {
        return $this->connector->send(new DeleteOrder($orderId));
    }

    /**
     * @param int $orderId ID of order to return the positions
     * @param int $limit limits the number of entries returned
     * @param int $offset set the index where the returned entries start
     * @param array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function getOrderPositionsById(int $orderId, ?int $limit, ?int $offset, ?array $embed): Response
    {
        return $this->connector->send(new GetOrderPositionsById($orderId, $limit, $offset, $embed));
    }

    /**
     * @param int $orderId ID of order to return the positions
     * @param int $limit limits the number of entries returned
     * @param int $offset set the index where the returned entries start
     * @param array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function getDiscounts(int $orderId, ?int $limit, ?int $offset, ?array $embed): Response
    {
        return $this->connector->send(new GetDiscounts($orderId, $limit, $offset, $embed));
    }

    /**
     * @param int $orderId ID of order to return the positions
     * @param bool $includeItself Define if the related objects include the order itself
     * @param bool $sortByType Define if you want the related objects sorted by type
     * @param array $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function getRelatedObjects(int $orderId, ?bool $includeItself, ?bool $sortByType, ?array $embed): Response
    {
        return $this->connector->send(new GetRelatedObjects($orderId, $includeItself, $sortByType, $embed));
    }

    /**
     * @param int $orderId ID of order to be sent via email
     */
    public function sendorderViaEmail(int $orderId): Response
    {
        return $this->connector->send(new SendorderViaEmail($orderId));
    }

    /**
     * @param int $orderid the id of the order
     * @param string $orderobjectName Model name, which is 'Order'
     */
    public function createPackingListFromOrder(int $orderid, string $orderobjectName): Response
    {
        return $this->connector->send(new CreatePackingListFromOrder($orderid, $orderobjectName));
    }

    /**
     * @param int $orderid the id of the order
     * @param string $orderobjectName Model name, which is 'Order'
     */
    public function createContractNoteFromOrder(int $orderid, string $orderobjectName): Response
    {
        return $this->connector->send(new CreateContractNoteFromOrder($orderid, $orderobjectName));
    }

    /**
     * @param int $orderId ID of order from which you want the pdf
     * @param bool $download If u want to download the pdf of the order.
     * @param bool $preventSendBy Defines if u want to send the order.
     */
    public function orderGetPdf(int $orderId, ?bool $download, ?bool $preventSendBy): Response
    {
        return $this->connector->send(new OrderGetPdf($orderId, $download, $preventSendBy));
    }

    /**
     * @param int $orderId ID of order to mark as sent
     */
    public function orderSendBy(int $orderId): Response
    {
        return $this->connector->send(new OrderSendBy($orderId));
    }
}
