<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNotePos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getcreditNotePositions
 *
 * Retrieve all creditNote positions depending on the filters defined in the query.
 */
class GetcreditNotePositions extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null $creditNoteid Retrieve all creditNote positions belonging to this creditNote. Must be provided with creditNote[objectName]
     * @param string|null $creditNoteobjectName Only required if creditNote[id] was provided. 'creditNote' should be used as value.
     */
    public function __construct(
        protected ?int $creditNoteid = null,
        protected ?string $creditNoteobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CreditNotePos';
    }

    public function defaultQuery(): array
    {
        return array_filter(['creditNote[id]' => $this->creditNoteid, 'creditNote[objectName]' => $this->creditNoteobjectName]);
    }
}
