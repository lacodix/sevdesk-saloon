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

    public function __construct(
        protected int $orderid,
    ) {
        $this->data['order'] = [
            'id' => $invoiceId,
            'objectName' => 'Order',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/Order/Factory/createContractNoteFromOrder';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
