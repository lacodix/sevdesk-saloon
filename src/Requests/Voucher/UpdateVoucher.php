<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateVoucher
 *
 * Update a draft voucher using this method if you want to change simple values like the description.
 * Complex changes like adding a position should use /Voucher/Factory/saveVoucher.<br> You can not
 * change the status using this endpoint.
 */
class UpdateVoucher extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $voucherId ID of voucher to update
     */
    public function __construct(
        protected int $voucherId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Voucher/{$this->voucherId}";
    }
}
