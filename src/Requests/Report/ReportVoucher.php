<?php

namespace Lacodix\SevdeskSaloon\Requests\Report;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reportVoucher
 *
 * Export voucher list
 */
class ReportVoucher extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $download,
        protected array $sevQuery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Report/voucherlist';
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'sevQuery' => $this->sevQuery]);
    }
}
