<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createInvoiceByFactory
 *
 * This endpoint offers you the following functionality.
 *      <ul>
 *         <li>Create invoices
 * together with positions and discounts</li>
 *         <li>Delete positions while adding new
 * ones</li>
 *         <li>Delete or add discounts, or both at the same time</li>
 *
 * <li>Automatically fill the address of the supplied contact into the invoice address</li>
 *
 * </ul>
 *      To make your own request sample slimmer, you can omit all parameters which are not
 * required and nullable.
 *      However, for a valid and logical bookkeeping document, you will also
 * need some of them to ensure that all the necessary data is in the invoice.<br><br> The list of
 * parameters starts with the invoice array.<br> This array contains all required attributes for a
 * complete invoice.<br> Most of the attributes are covered in the invoice attribute list, there are
 * only two parameters standing out, namely <b>mapAll</b> and <b>objectName</b>.<br> These are just
 * needed for our system and you always need to provide them.<br><br> The list of parameters then
 * continues with the invoice position array.<br> With this array you have the possibility to add
 * multiple positions at once.<br> In the example it only contains one position, again together with
 * the parameters <b>mapAll</b> and <b>objectName</b>, however, you can add more invoice positions by
 * extending the array.<br> So if you wanted to add another position, you would add the same list of
 * parameters with an incremented array index of "1" instead of "0".<br><br> The list ends with the
 * four parameters invoicePosDelete, discountSave, discountDelete and takeDefaultAddress.<br> They only
 * play a minor role if you only want to create an invoice but we will shortly explain what they can
 * do.<br> With invoicePosDelete you have to option to delete invoice positions as this request can
 * also be used to update invoices.<br> With discountSave you can add discounts to your invoice.<br>
 * With discountDelete you can delete discounts from your invoice.<br> With takeDefaultAddress you can
 * specify that the first address of the contact you are using for the invoice is taken for the invoice
 * address attribute automatically, so you don't need to provide the address yourself.<br> If you want
 * to know more about these parameters, for example if you want to use this request to update invoices,
 * feel free to contact our support.<br><br> Finally, after covering all parameters, they only
 * important information left, is that the order of the last four attributes always needs to be
 * kept.<br> You will also always need to provide all of them, as otherwise the request won't work
 * properly.<br><br> <b>Warning:</b> You can not create a regular invoice with the <b>deliveryDate</b>
 * being later than the <b>invoiceDate</b>.<br> To do that you will need to create a so called
 * <b>Abschlagsrechnung</b> by setting the <b>invoiceType</b> parameter to <b>AR</b>.
 */
class CreateInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $contactId,
        protected array $data,
    ) {
        $this->data['contact'] = [
            'id' => $contactId,
            'objectName' => 'Contact',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice/Factory/saveInvoice';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
