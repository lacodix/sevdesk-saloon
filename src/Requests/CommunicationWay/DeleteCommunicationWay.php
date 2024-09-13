<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteCommunicationWay
 */
class DeleteCommunicationWay extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $communicationWayId Id of communication way resource to delete
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
