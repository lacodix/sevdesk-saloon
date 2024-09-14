<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCreditNoteFromInvoice
 *
 * Use this endpoint to create a new creditNote from an invoice.
 */
class CreateCreditNoteFromInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected array $data;

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
        return '/CreditNote/Factory/createFromInvoice';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
