<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * UpdateCommunicationWay
 *
 * Update a communication way
 */
class UpdateCommunicationWay extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $communicationWayId ID of CommunicationWay to update
     */
    public function __construct(
        protected int $communicationWayId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CommunicationWay/{$this->communicationWayId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
