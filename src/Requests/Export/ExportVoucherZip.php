<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportVoucherZip
 *
 * export all vouchers as zip
 */
class ExportVoucherZip extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $download,
        protected array $sevQuery,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Export/voucherZip';
    }

    public function defaultQuery(): array
    {
        return array_filter(['download' => $this->download, 'sevQuery' => $this->sevQuery]);
    }
}
