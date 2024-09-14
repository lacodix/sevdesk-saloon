<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateContactFieldSetting extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $contactCustomFieldSettingId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
