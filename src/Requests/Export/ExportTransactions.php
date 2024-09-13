<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportTransactions
 *
 * Export all transactions as csv
 */
class ExportTransactions extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $download,
        protected array $sevQuery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Export/transactionsCsv';
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'sevQuery' => $this->sevQuery]);
    }
}
