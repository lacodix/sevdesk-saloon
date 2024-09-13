<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateCommunicationWay
 *
 * Update a communication way
 */
class UpdateCommunicationWay extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $communicationWayId ID of CommunicationWay to update
     */
    public function __construct(
        protected int $communicationWayId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CommunicationWay/{$this->communicationWayId}";
    }
}
