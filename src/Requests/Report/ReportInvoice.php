<?php

namespace Lacodix\SevdeskSaloon\Requests\Report;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reportInvoice
 *
 * Export invoice list
 */
class ReportInvoice extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $download,
        protected string $view,
        protected array $sevQuery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Report/invoicelist';
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'view' => $this->view, 'sevQuery' => $this->sevQuery]);
    }
}
