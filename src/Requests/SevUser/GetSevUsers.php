<?php

namespace Lacodix\SevdeskSaloon\Requests\SevUser;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTags
 *
 * Retrieve all tags
 */
class GetSevUsers extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $id = null,
        protected ?string $name = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/SevUser';
    }

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id, 'name' => $this->name]);
    }
}
