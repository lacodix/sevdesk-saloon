<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createPackingListFromOrder
 *
 * Create packing list from order
 */
class CreatePackingListFromOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected array $data = [];

    public function __construct(
        protected int $orderId,
    ) {
        $this->data['order'] = [
            'id' => $orderId,
            'objectName' => 'Order',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/Order/Factory/createPackingListFromOrder';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
