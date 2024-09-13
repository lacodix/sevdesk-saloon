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
    public function reportInvoice(?bool $download, string $view, array $sevQuery): Response
    {
        return $this->connector->send(new ReportInvoice($download, $view, $sevQuery));
    }

    public function reportOrder(?bool $download, string $view, array $sevQuery): Response
    {
        return $this->connector->send(new ReportOrder($download, $view, $sevQuery));
    }

    public function reportContact(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ReportContact($download, $sevQuery));
    }

    public function reportVoucher(?bool $download, array $sevQuery): Response
    {
        return $this->connector->send(new ReportVoucher($download, $sevQuery));
    }
}
