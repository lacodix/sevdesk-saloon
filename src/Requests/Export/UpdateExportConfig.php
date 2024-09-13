<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateExportConfig
 *
 * Update export config to export datev CSV
 */
class UpdateExportConfig extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int $sevClientId id of sevClient
     */
    public function __construct(
        protected float|int $sevClientId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/SevClient/{$this->sevClientId}/updateExportConfig";
    }
}
