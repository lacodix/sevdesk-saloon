<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateExportConfig
 *
 * Update export config to export datev CSV
 */
class UpdateExportConfig extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $sevClientId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/SevClient/{$this->sevClientId}/updateExportConfig";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
