<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportCreditNote
 *
 * Export all credit notes as csv
 */
class ExportCreditNote extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $download,
        protected array $sevQuery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Export/creditNoteCsv';
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'sevQuery' => $this->sevQuery]);
    }
}
