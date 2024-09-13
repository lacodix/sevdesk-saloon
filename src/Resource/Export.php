<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Export\ExportContact;
use Lacodix\SevdeskSaloon\Requests\Export\ExportCreditNote;
use Lacodix\SevdeskSaloon\Requests\Export\ExportDatev;
use Lacodix\SevdeskSaloon\Requests\Export\ExportInvoice;
use Lacodix\SevdeskSaloon\Requests\Export\ExportInvoiceZip;
use Lacodix\SevdeskSaloon\Requests\Export\ExportTransactions;
use Lacodix\SevdeskSaloon\Requests\Export\ExportVoucher;
use Lacodix\SevdeskSaloon\Requests\Export\ExportVoucherZip;
use Lacodix\SevdeskSaloon\Requests\Export\UpdateExportConfig;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Export extends Resource
{
    /**
     * @param float|int $sevClientId id of sevClient
     */
    public function updateExportConfig(float|int $sevClientId): Response
    {
        return $this->connector->send(new UpdateExportConfig($sevClientId));
    }

    /**
     * @param bool $download Specifies if the document is downloaded
     * @param int $startDate the start date of the export as timestamp
     * @param int $endDate the end date of the export as timestamp
     * @param string $scope Define what you want to include in the datev export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the datev export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
     * @param bool $withUnpaidDocuments include unpaid documents
     * @param bool $withEnshrinedDocuments include enshrined documents
     * @param bool $enshrine Specify if you want to enshrine all models which were included in the export
     */
    public function exportDatev(
        ?bool $download,
        int $startDate,
        int $endDate,
        string $scope,
        ?bool $withUnpaidDocuments,
        ?bool $withEnshrinedDocuments,
        ?bool $enshrine,
    ): Response {
        return $this->connector->send(new ExportDatev($download, $startDate, $endDate, $scope, $withUnpaidDocuments, $withEnshrinedDocuments, $enshrine));
    }

    public function exportInvoice(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportInvoice($download, $sevQuery));
    }

    public function exportInvoiceZip(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportInvoiceZip($download, $sevQuery));
    }

    public function exportCreditNote(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportCreditNote($download, $sevQuery));
    }

    public function exportVoucher(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportVoucher($download, $sevQuery));
    }

    public function exportTransactions(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportTransactions($download, $sevQuery));
    }

    public function exportVoucherZip(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportVoucherZip($download, $sevQuery));
    }

    public function exportContact(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ExportContact($download, $sevQuery));
    }
}
