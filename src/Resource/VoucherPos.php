<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\VoucherPos\GetVoucherPositions;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class VoucherPos extends Resource
{
    /**
     * @param int $voucherid Retrieve all vouchers positions belonging to this voucher. Must be provided with voucher[objectName]
     * @param string $voucherobjectName Only required if voucher[id] was provided. 'Voucher' should be used as value.
     */
    public function get(?int $voucherid = null, ?string $voucherobjectName = null): array
    {
        return $this->connector->sevSend(new GetVoucherPositions($voucherid, $voucherobjectName));
    }
}
