<?php

namespace Lacodix\SevdeskSaloon\Requests\Export;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * exportDatev
 *
 * Datev export as zip with csv´s. Before you can perform the datev export, you must first set the
 * "accountingYearBegin". To do this, you must use the <a
 * href='#tag/Export/operation/updateExportConfig'>updateExportConfig</a> endpoint.
 */
class ExportDatev extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param bool|null $download Specifies if the document is downloaded
     * @param int $startDate the start date of the export as timestamp
     * @param int $endDate the end date of the export as timestamp
     * @param string $scope Define what you want to include in the datev export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the datev export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
     * @param bool|null $withUnpaidDocuments include unpaid documents
     * @param bool|null $withEnshrinedDocuments include enshrined documents
     * @param bool|null $enshrine Specify if you want to enshrine all models which were included in the export
     */
    public function __construct(
        protected ?bool $download,
        protected int $startDate,
        protected int $endDate,
        protected string $scope,
        protected ?bool $withUnpaidDocuments = null,
        protected ?bool $withEnshrinedDocuments = null,
        protected ?bool $enshrine = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Export/datevCSV';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'Download' => $this->download,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'scope' => $this->scope,
            'withUnpaidDocuments' => $this->withUnpaidDocuments,
            'withEnshrinedDocuments' => $this->withEnshrinedDocuments,
            'enshrine' => $this->enshrine,
        ]);
    }
}
