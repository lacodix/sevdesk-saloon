<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createInvoiceFromOrder
 *
 * Create an invoice from an order
 */
class CreateInvoiceFromOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/Invoice/Factory/createInvoiceFromOrder';
    }
}
