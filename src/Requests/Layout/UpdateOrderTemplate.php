<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateOrderTemplate
 *
 * Update an existing order template
 */
class UpdateOrderTemplate extends Request
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $orderId ID of order to update
     */
    public function __construct(
        protected int $orderId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/changeParameter";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
