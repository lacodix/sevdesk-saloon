<?php

namespace Lacodix\SevdeskSaloon\Requests\Part;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updatePart
 *
 * Update a part
 */
class UpdatePart extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $partId ID of part to update
     */
    public function __construct(
        protected int $partId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Part/{$this->partId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
