<?php

namespace Lacodix\SevdeskSaloon\Requests\Invoice;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getInvoicePositionsById
 *
 * Returns all positions of an invoice
 */
class GetInvoicePositionsById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $invoiceId ID of invoice to return the positions
     * @param int|null $limit limits the number of entries returned
     * @param int|null $offset set the index where the returned entries start
     * @param array|null $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function __construct(
        protected int $invoiceId,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?array $embed = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Invoice/{$this->invoiceId}/getPositions";
    }

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'offset' => $this->offset, 'embed' => $this->embed]);
    }
}
