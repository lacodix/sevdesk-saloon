<?php

namespace Lacodix\SevdeskSaloon\Requests\Layout;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getTemplates
 *
 * Retrieve all templates
 */
class GetTemplates extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $type Type of the templates you want to get.
     */
    public function __construct(
        protected ?string $type = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/DocServer/getTemplatesWithThumb';
    }

    public function defaultQuery(): array
    {
        return array_filter(['type' => $this->type]);
    }
}
