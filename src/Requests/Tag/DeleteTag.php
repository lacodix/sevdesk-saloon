<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteTag
 */
class DeleteTag extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $tagId Id of tag to delete
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
