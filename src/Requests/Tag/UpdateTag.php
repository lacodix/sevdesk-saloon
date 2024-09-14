<?php

namespace Lacodix\SevdeskSaloon\Requests\Tag;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateTag
 *
 * Update an existing tag
 */
class UpdateTag extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $tagId ID of tag you want to update
     */
    public function __construct(
        protected int $tagId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Tag/{$this->tagId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
