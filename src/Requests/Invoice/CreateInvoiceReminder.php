<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createInvoiceReminder
 *
 * Create an reminder from an invoice
 */
class CreateInvoiceReminder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected array $data;

    /**
     * @param int $invoiceId the id of the invoice
     * @param string $invoiceobjectName Model name, which is 'Invoice'
     */
    public function __construct(
        protected int $invoiceId,
    ) {
        $this->data['invoice'] = [
            'id' => $invoiceId,
            'objectName' => 'Invoice',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice/Factory/createInvoiceReminder';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
