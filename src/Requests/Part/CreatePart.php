<?php

namespace Lacodix\SevdeskSaloon\Requests\Part;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createPart
 *
 * Creates a part in your sevdesk inventory.
 */
class CreatePart extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Part';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
