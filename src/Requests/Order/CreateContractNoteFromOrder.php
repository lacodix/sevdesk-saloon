<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContractNoteFromOrder
 *
 * Create contract note from order
 */
class CreateContractNoteFromOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param int $orderid the id of the order
     * @param string $orderobjectName Model name, which is 'Order'
     */
    public function __construct(
        protected int $orderid,
        protected string $orderobjectName,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Order/Factory/createContractNoteFromOrder';
    }

    public function defaultQuery(): array
    {
        return array_filter(['order[id]' => $this->orderid, 'order[objectName]' => $this->orderobjectName]);
    }
}
