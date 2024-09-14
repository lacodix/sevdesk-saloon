<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateVoucher
 *
 * Update a draft voucher using this method if you want to change simple values like the description.
 * Complex changes like adding a position should use /Voucher/Factory/saveVoucher.<br> You can not
 * change the status using this endpoint.
 */
class UpdateVoucher extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $voucherId ID of voucher to update
     */
    public function __construct(
        protected int $voucherId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Voucher/{$this->voucherId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
