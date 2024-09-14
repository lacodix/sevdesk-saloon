<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Report\ReportContact;
use Lacodix\SevdeskSaloon\Requests\Report\ReportInvoice;
use Lacodix\SevdeskSaloon\Requests\Report\ReportOrder;
use Lacodix\SevdeskSaloon\Requests\Report\ReportVoucher;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Report extends Resource
{
    public function invoice(string $view, array $sevQuery, ?bool $download = null): array
    {
        return $this->connector->sevSend(new ReportInvoice($download, $view, $sevQuery));
    }

    public function order(string $view, array $sevQuery, ?bool $download = null): array
    {
        return $this->connector->sevSend(new ReportOrder($download, $view, $sevQuery));
    }

    public function contact(array $sevQuery, ?bool $download = null): array
    {
        return $this->connector->sevSend(new ReportContact($download, $sevQuery));
    }

    public function voucher(array $sevQuery, ?bool $download = null): array
    {
        return $this->connector->sevSend(new ReportVoucher($download, $sevQuery));
    }
}
