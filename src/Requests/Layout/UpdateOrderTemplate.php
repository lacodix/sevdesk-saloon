<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateOrderTemplate
 *
 * Update an existing order template
 */
class UpdateOrderTemplate extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $orderId ID of order to update
     */
    public function __construct(
        protected int $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/changeParameter";
    }
}
