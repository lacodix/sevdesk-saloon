<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTagById
 *
 * Returns a single tag
 */
class GetSevSequenceByType extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $tagId ID of tag to return
     */
    public function __construct(
        protected string $objectType,
        protected string $type
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/SevSequence/Factory/getByType?objectType={$this->objectType}&type={$this->type}";
    }
}
