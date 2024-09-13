<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * bookVoucher
 *
 * Booking the voucher with a transaction is probably the most important part in the bookkeeping
 * process.<br> There are several ways on correctly booking a voucher, all by using the same
 * endpoint.<br> Conveniently, the booking process is exactly the same as the process for invoices.<br>
 * For this reason, you can have a look at it <a
 * href='#tag/Voucher/How-to-filter-for-certain-vouchers'>here</a> and all you need to to is to change
 * "Invoice" into "Voucher" in the URL.
 */
class BookVoucher extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $voucherId ID of voucher to book
     */
    public function __construct(
        protected int $voucherId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Voucher/{$this->voucherId}/bookAmount";
    }
}
