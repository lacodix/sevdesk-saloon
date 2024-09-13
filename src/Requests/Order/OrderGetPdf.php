<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orderGetPdf
 *
 * Retrieves the pdf document of an order with additional metadata and commit the order.
 */
class OrderGetPdf extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $orderId ID of order from which you want the pdf
     * @param bool|null $download If u want to download the pdf of the order.
     * @param bool|null $preventSendBy Defines if u want to send the order.
     */
    public function __construct(
        protected int $orderId,
        protected ?bool $download = null,
        protected ?bool $preventSendBy = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/getPdf";
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'preventSendBy' => $this->preventSendBy]);
    }
}
