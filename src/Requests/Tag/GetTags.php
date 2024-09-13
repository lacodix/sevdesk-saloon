<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTags
 *
 * Retrieve all tags
 */
class GetTags extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param float|int|null $id ID of the Tag
     * @param string|null $name Name of the Tag
     */
    public function __construct(
        protected float|int|null $id = null,
        protected ?string $name = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Tag';
    }

    public function defaultQuery(): array
    {
        return array_filter(['id' => $this->id, 'name' => $this->name]);
    }
}
