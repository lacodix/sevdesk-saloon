<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createContactFieldSetting
 *
 * Create contact field setting
 */
class CreateContactFieldSetting extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/ContactCustomFieldSetting';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
