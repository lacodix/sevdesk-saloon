<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getVoucherById
 *
 * Returns a single voucher
 */
class GetVoucherById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $voucherId ID of voucher to return
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
