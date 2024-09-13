<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Voucher\BookVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForAccountNumber;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForAllAccounts;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForExpense;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForRevenue;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForTaxRule;
use Lacodix\SevdeskSaloon\Requests\Voucher\GetVoucherById;
use Lacodix\SevdeskSaloon\Requests\Voucher\GetVouchers;
use Lacodix\SevdeskSaloon\Requests\Voucher\UpdateVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherEnshrine;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherFactorySaveVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherResetToDraft;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherResetToOpen;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherUploadFile;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Voucher extends Resource
{
    public function voucherFactorySaveVoucher(): Response
    {
        return $this->connector->send(new VoucherFactorySaveVoucher());
    }

    public function voucherUploadFile(): Response
    {
        return $this->connector->send(new VoucherUploadFile());
    }

    /**
     * @param float|int $status Status of the vouchers to retrieve.
     * @param string $creditDebit Define if you only want credit or debit vouchers.
     * @param string $descriptionLike Retrieve all vouchers with a description like this.
     * @param int $startDate Retrieve all vouchers with a date equal or higher
     * @param int $endDate Retrieve all vouchers with a date equal or lower
     * @param int $contactid Retrieve all vouchers with this contact. Must be provided with contact[objectName]
     * @param string $contactobjectName Only required if contact[id] was provided. 'Contact' should be used as value.
     */
    public function getVouchers(
        float|int|null $status,
        ?string $creditDebit,
        ?string $descriptionLike,
        ?int $startDate,
        ?int $endDate,
        ?int $contactid,
        ?string $contactobjectName,
    ): Response {
        return $this->connector->send(new GetVouchers($status, $creditDebit, $descriptionLike, $startDate, $endDate, $contactid, $contactobjectName));
    }

    /**
     * @param int $voucherId ID of voucher to return
     */
    public function getVoucherById(int $voucherId): Response
    {
        return $this->connector->send(new GetVoucherById($voucherId));
    }

    /**
     * @param int $voucherId ID of voucher to update
     */
    public function updateVoucher(int $voucherId): Response
    {
        return $this->connector->send(new UpdateVoucher($voucherId));
    }

    /**
     * @param int $voucherId ID of the voucher to enshrine
     */
    public function voucherEnshrine(int $voucherId): Response
    {
        return $this->connector->send(new VoucherEnshrine($voucherId));
    }

    /**
     * @param int $voucherId ID of voucher to book
     */
    public function bookVoucher(int $voucherId): Response
    {
        return $this->connector->send(new BookVoucher($voucherId));
    }

    /**
     * @param int $voucherId ID of the voucher to reset
     */
    public function voucherResetToOpen(int $voucherId): Response
    {
        return $this->connector->send(new VoucherResetToOpen($voucherId));
    }

    /**
     * @param int $voucherId ID of the voucher to reset
     */
    public function voucherResetToDraft(int $voucherId): Response
    {
        return $this->connector->send(new VoucherResetToDraft($voucherId));
    }

    public function forAllAccounts(): Response
    {
        return $this->connector->send(new ForAllAccounts());
    }

    /**
     * @param int $accountNumber The datev account number you want to get additional information of
     */
    public function forAccountNumber(int $accountNumber): Response
    {
        return $this->connector->send(new ForAccountNumber($accountNumber));
    }

    /**
     * @param string $taxRule The code of the tax rule you want to get guidance for.
     */
    public function forTaxRule(string $taxRule): Response
    {
        return $this->connector->send(new ForTaxRule($taxRule));
    }

    public function forRevenue(): Response
    {
        return $this->connector->send(new ForRevenue());
    }

    public function forExpense(): Response
    {
        return $this->connector->send(new ForExpense());
    }
}
