<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * voucherResetToDraft
 *
 * Resets the status "Draft" (`"status": "50"`). Linked payments will be unlinked. Created asset
 * depreciation will be reset.<br>
 * This is not possible if the voucher is already enshrined!
 *
 * You can
 * only change the status from higher to lower ("Open" to "Draft").<br>
 * To change to higher status use
 * [/Voucher/Factory/saveVoucher](#tag/Voucher/operation/voucherFactorySaveVoucher).
 */
class VoucherResetToDraft extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $voucherId ID of the voucher to reset
     */
    public function __construct(
        protected int $voucherId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Voucher/{$this->voucherId}/resetToDraft";
    }
}
