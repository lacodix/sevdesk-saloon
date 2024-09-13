<?php

namespace Lacodix\SevdeskSaloon\Requests\CreditNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCreditNotes
 *
 * There are a multitude of parameter which can be used to filter.
 */
class GetCreditNotes extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $status Status of the CreditNote
     * @param string|null $creditNoteNumber Retrieve all CreditNotes with this creditNote number
     * @param int|null $startDate Retrieve all CreditNotes with a date equal or higher
     * @param int|null $endDate Retrieve all CreditNotes with a date equal or lower
     * @param int|null $contactid Retrieve all CreditNotes with this contact. Must be provided with contact[objectName]
     * @param string|null $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function __construct(
        protected ?string $status = null,
        protected ?string $creditNoteNumber = null,
        protected ?int $startDate = null,
        protected ?int $endDate = null,
        protected ?int $contactid = null,
        protected ?string $contactobjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CreditNote';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'status' => $this->status,
            'creditNoteNumber' => $this->creditNoteNumber,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'contact[id]' => $this->contactid,
            'contact[objectName]' => $this->contactobjectName,
        ]);
    }
}
