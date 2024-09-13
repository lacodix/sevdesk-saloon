<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createcreditNote
 *
 * The list of parameters starts with the credit note array.<br> This array contains all required
 * attributes for a complete credit note.<br> Most of the attributes are covered in the credit note
 * attribute list, there are only two parameters standing out, namely <b>mapAll</b> and
 * <b>objectName</b>.<br> These are just needed for our system and you always need to provide them.<br>
 * The list of parameters then continues with the credit note position array.<br> With this array you
 * have the possibility to add multiple positions at once.<br> In the example it only contains one
 * position, again together with the parameters <b>mapAll</b> and <b>objectName</b>, however, you can
 * add more credit note positions by extending the array.<br> So if you wanted to add another position,
 * you would add the same list of parameters with an incremented array index of "1" instead of
 * "0".<br><br> The list ends with the five parameters creditNotePosDelete, discountSave,
 * discountDelete, takeDefaultAddress and forCashRegister.<br> They only play a minor role if you only
 * want to create a credit note but we will shortly explain what they can do.<br> With
 * creditNotePosDelete you have to option to delete credit note positions as this request can also be
 * used to update credit notes.<br> Both discount parameters are deprecated and have no use for credit
 * notes, however they need to be provided in case you want to use the following two parameters.<br>
 * With takeDefaultAddress you can specify that the first address of the contact you are using for the
 * credit note is taken for the credit note address attribute automatically, so you don't need to
 * provide the address yourself.<br> Finally, the forCashRegister parameter needs to be set to
 * <b>true</b> if your credit note is to be booked on the cash register.<br> If you want to know more
 * about these parameters, for example if you want to use this request to update credit notes, feel
 * free to contact our support.<br> Finally, after covering all parameters, they only important
 * information left, is that the order of the last five attributes always needs to be kept.<br> You
 * will also always need to provide all of them, as otherwise the request won't work properly.
 */
class CreatecreditNote extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/CreditNote/Factory/saveCreditNote';
    }
}
