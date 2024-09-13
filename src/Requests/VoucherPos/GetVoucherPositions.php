<?php

namespace Lacodix\SevdeskSaloon\Requests\VoucherPos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getVoucherPositions
 *
 * Retrieve all voucher positions depending on the filters defined in the query.
 */
class GetVoucherPositions extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $voucherid Retrieve all vouchers positions belonging to this voucher. Must be provided with voucher[objectName]
     * @param string|null $voucherobjectName Only required if voucher[id] was provided. 'Voucher' should be used as value.
     */
    public function __construct(
        protected ?int $voucherid = null,
        protected ?string $voucherobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/VoucherPos';
    }

    public function defaultQuery(): array
    {
        return array_filter(['voucher[id]' => $this->voucherid, 'voucher[objectName]' => $this->voucherobjectName]);
    }
}
