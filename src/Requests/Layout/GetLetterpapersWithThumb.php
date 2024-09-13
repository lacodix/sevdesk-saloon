<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getLetterpapersWithThumb
 *
 * Retrieve all letterpapers with Thumb
 */
class GetLetterpapersWithThumb extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/DocServer/getLetterpapersWithThumb';
    }
}
