<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCommunicationWay
 *
 * Creates a new contact communication way.
 */
class CreateCommunicationWay extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CommunicationWay';
    }
}
