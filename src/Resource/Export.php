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

class Export extends Resource
{
    public function updateConfig(int $sevClientId, array $data): array
    {
        return $this->connector->sevSend(new UpdateExportConfig($sevClientId, $data));
    }

    /**
     * @param int $startDate the start date of the export as timestamp
     * @param int $endDate the end date of the export as timestamp
     * @param string $scope Define what you want to include in the datev export. This parameter takes a string of 5 letters. Each stands for a model that should be included. Possible letters are: ‘E’ (Earnings), ‘X’ (Expenditure), ‘T’ (Transactions), ‘C’ (Cashregister), ‘D’ (Assets). By providing one of those letter you specify that it should be included in the datev export. Some combinations are: ‘EXTCD’, ‘EXTD’ …
     * @param bool $download Specifies if the document is downloaded
     * @param bool $withUnpaidDocuments include unpaid documents
     * @param bool $withEnshrinedDocuments include enshrined documents
     * @param bool $enshrine Specify if you want to enshrine all models which were included in the export
     */
    public function datev(
        int $startDate,
        int $endDate,
        string $scope,
        ?bool $download = null,
        ?bool $withUnpaidDocuments = null,
        ?bool $withEnshrinedDocuments = null,
        ?bool $enshrine = null,
    ): array {
        return $this->connector->sevSend(new ExportDatev($download, $startDate, $endDate, $scope, $withUnpaidDocuments, $withEnshrinedDocuments, $enshrine));
    }

    public function invoice(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportInvoice($download, $sevQuery));
    }

    public function invoiceZip(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportInvoiceZip($download, $sevQuery));
    }

    public function creditNote(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportCreditNote($download, $sevQuery));
    }

    public function voucher(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportVoucher($download, $sevQuery));
    }

    public function transactions(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportTransactions($download, $sevQuery));
    }

    public function voucherZip(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportVoucherZip($download, $sevQuery));
    }

    public function contact(?bool $download, array $sevQuery): array
    {
        return $this->connector->sevSend(new ExportContact($download, $sevQuery));
    }
}
