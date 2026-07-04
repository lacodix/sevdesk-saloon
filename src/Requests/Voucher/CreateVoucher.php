<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * voucherFactorySaveVoucher
 *
 * Bundles the creation or updating of voucher and voucher position.<br> The list of parameters starts
 * with the voucher model.<br> This contains all required attributes for a complete voucher.<br> Most
 * of the attributes are covered in the voucher attribute list, there are only two parameters standing
 * out, namely <b>mapAll</b> and <b>objectName</b>.<br> These are just needed for our system and you
 * always need to provide them.<br><br> The list of parameters then continues with the voucher position
 * array.<br> With this array you have the possibility to add multiple positions at once.<br> In the
 * example it only contains one position, again together with the parameters <b>mapAll</b> and
 * <b>objectName</b>, however, you can add more voucher positions by extending the array.<br> So if you
 * wanted to add another position, you would add the same list of parameters with an incremented array
 * index of \"1\" instead of \"0\".<br><br> The list ends with the two parameters voucherPosDelete and
 * filename.<br> We will shortly explain what they can do.<br> With voucherPosDelete you can delete
 * voucher positions as this request can also be used to update draft vouchers.<br> With filename you
 * can attach a file to the voucher.<br> For most of our customers this is a really important step, as
 * they need to digitize their receipts.<br> Finally, after covering all parameters, the only important
 * information left, is that the order of the last two attributes always needs to be kept. <br><br> The
 * only valid status values for this endpoint are 50 (draft) and 100 (open). You can only update draft
 * vouchers. If you have to, you can downgrade the status by calling resetToOpen (from paid) and
 * resetToDraft (from open).
 */
class CreateVoucher extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Voucher/Factory/saveVoucher';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
