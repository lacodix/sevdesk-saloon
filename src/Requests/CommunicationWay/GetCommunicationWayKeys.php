<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCommunicationWayKeys
 *
 * Returns all communication way keys.
 */
class GetCommunicationWayKeys extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CommunicationWayKey';
    }
}
