<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createTag
 *
 * Create a new tag
 */
class CreateTag extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/Tag/Factory/create';
    }
}
