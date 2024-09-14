<?php

namespace Lacodix\SevdeskSaloon\Requests\SevSequence;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSevSequenceByType extends Request
{
    protected Method $method = Method::GET;

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
