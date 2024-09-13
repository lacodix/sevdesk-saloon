<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * voucherEnshrine
 *
 * Sets the current date and time as a value for the property `enshrined`.<br>
 * This operation is only
 * possible if the status is "Open" (`"status": "100"`) or higher.
 *
 * Enshrined vouchers cannot be
 * changed. This operation cannot be undone.
 */
class VoucherEnshrine extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $voucherId ID of the voucher to enshrine
     */
    public function __construct(
        protected int $voucherId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Voucher/{$this->voucherId}/enshrine";
    }
}
