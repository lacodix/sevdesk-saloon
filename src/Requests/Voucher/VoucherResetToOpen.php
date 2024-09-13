<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * voucherResetToOpen
 *
 * Resets the status to "Open" (`"status": "100"`). Linked payments will be unlinked. Created asset
 * depreciation will be reset.<br>
 * This is not possible if the voucher is already enshrined!
 *
 * This
 * endpoint can not be used to increase the status from "Draft" to "Open".<br>
 * You can only change the
 * status from higher to lower ("Open" to "Draft").<br>
 * To change to higher status use
 * [Voucher/{voucherId}/bookAmount](#tag/Voucher/operation/bookVoucher).
 * To change to lower status use
 * [Voucher/{voucherId}/resetToDraft](#tag/Voucher/operation/voucherResetToDraft).
 */
class VoucherResetToOpen extends Request
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
        return "/Voucher/{$this->voucherId}/resetToOpen";
    }
}
