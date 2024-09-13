<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTagById
 *
 * Returns a single tag
 */
class GetTagById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $tagId ID of tag to return
     */
    public function __construct(
        protected int $tagId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Tag/{$this->tagId}";
    }
}
