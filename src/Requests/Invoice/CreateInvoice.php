<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Lacodix\SevdeskSaloon\Enums\Countries;
use Lacodix\SevdeskSaloon\Enums\InvoiceStatus;
use Lacodix\SevdeskSaloon\Traits\HasPositions;
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
    use HasPositions;

    protected Method $method = Method::POST;
    protected array $sevdeskConfig = [];

    public function __construct(
        protected int $contactId,
        protected array $items,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice/Factory/saveInvoice';
    }

    public function defaultBody(): array
    {
        return [
            'invoice' => [
                'objectName' => 'Invoice',
                'mapAll' => 'true',
                'invoiceNumber' => $this->data['invoiceNumber'] ?? null,
                'contact' => [
                    'id' => $this->contactId,
                    'objectName' => 'Contact',
                ],
                'contactPerson' => [
                    'id' => $this->sevdeskConfig['sevUserId'],
                    'objectName' => 'SevUser',
                ],
                'invoiceDate' => $this->data['invoiceDate'] ?? date('Y-m-d H:i:s'),
                'header' => $this->data['header'] ?? null,
                'headText' => $this->data['headText'] ?? null,
                'footText' => $this->data['footText'] ?? null,
                'timeToPay' => $this->data['timeToPay'] ?? null,
                'discount' => $this->data['discount'] ?? 0,
                'address' => $this->data['address'] ?? null,
                'addressCountry' => [
                    'id' => $this->data['country'] ?? Countries::GERMANY->value,
                    'objectName' => 'StaticCountry',
                ],
                'payDay' => $this->data['payDay'] ?? null,
                'deliveryDate' => $this->data['deliveryDate'] ?? date('Y-m-d H:i:s'),
                'deliveryDateUntil' => $this->data['deliveryDateUntil'] ?? null,
                'status' => $this->data['status'] ?? InvoiceStatus::DRAFT->value,
                'smallSettlement' => $this->data['smallSettlement'] ?? null,
                'taxRate' => $this->data['taxRate'] ?? $this->sevdeskConfig['taxRate'],
                'taxText' => $this->data['taxText'] ?? $this->sevdeskConfig['taxText'],
                // ==== only in version 1.0 ====
                'taxType' => $this->data['taxType'] ?? $this->sevdeskConfig['taxType'],
                'taxSet' => empty($this->data['taxSetId']) ? null : [
                    'id' => $this->data['taxSetId'],
                    'objectName' => 'TaxSet',
                ],
                // ==== only in version 2.0 ====
                'taxRule' => [
                    'id' => $this->sevdeskConfig['taxRule'],
                    'objectName' => 'TaxRule',
                ],
                // =============================
                'paymentMethod' => empty($this->data['paymentMethodId']) ? null : [
                    'id' => $this->data['paymentMethodId'],
                    'objectName' => 'PaymentMethod',
                ],
                'sendDate' => $this->data['sendDate'] ?? date('Y-m-d H:i:s'),
                'invoiceType' => $this->data['invoiceType'] ?? $this->sevdeskConfig['invoiceType'],
                'currency' => $this->data['currency'] ?? $this->sevdeskConfig['currency'],
                'showNet' => $this->data['showNet'] ?? null,
                'sendType' => $this->data['sendType'] ?? null,
                'origin' => empty($this->data['originId']) || empty($this->data['originModel']) ? null : [
                    'id' => $this->data['originId'],
                    'objectName' => $this->data['originModel'],
                ],
                'customerInternalNote' => $this->data['customerInternalNote'] ?? null,
            ],
            'takeDefaultAddress' => 'true',
            'invoicePosSave' => self::getPositions($this->items, $this->sevdeskConfig, 'invoice'),
        ];
    }

    public function setConfig(array $config): static
    {
        $this->sevdeskConfig = $config;

        return $this;
    }
}
