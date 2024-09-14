<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCreditNoteFromVoucher
 *
 * **Not supported with sevdesk-Update 2.0**
 *
 * Use this endpoint to create a new creditNote from a
 * voucher.
 */
class CreateCreditNoteFromVoucher extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected array $data;

    public function __construct(
        protected int $voucherId,
    ) {
        $this->data['voucher'] = [
            'id' => $voucherId,
            'objectName' => 'Voucher',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/CreditNote/Factory/createFromVoucher';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
