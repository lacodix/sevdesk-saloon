<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Voucher\BookVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\CreateVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForAccountNumber;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForAllAccounts;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForExpense;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForRevenue;
use Lacodix\SevdeskSaloon\Requests\Voucher\ForTaxRule;
use Lacodix\SevdeskSaloon\Requests\Voucher\GetVoucherById;
use Lacodix\SevdeskSaloon\Requests\Voucher\GetVouchers;
use Lacodix\SevdeskSaloon\Requests\Voucher\UpdateVoucher;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherEnshrine;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherResetToDraft;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherResetToOpen;
use Lacodix\SevdeskSaloon\Requests\Voucher\VoucherUploadFile;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Voucher extends Resource
{
    public function create(array $data): array
    {
        return $this->connector->sevSend(new CreateVoucher());
    }

    public function uploadFile(string $file): array
    {
        return $this->connector->sevSend(new VoucherUploadFile($file));
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
    public function get(
        ?int $status = null,
        ?string $creditDebit = null,
        ?string $descriptionLike = null,
        ?int $startDate = null,
        ?int $endDate = null,
        ?int $contactid = null,
        ?string $contactobjectName = null,
    ): array {
        return $this->connector->sevSend(new GetVouchers($status, $creditDebit, $descriptionLike, $startDate, $endDate, $contactid, $contactobjectName));
    }

    /**
     * @param int $voucherId ID of voucher to return
     */
    public function getById(int $voucherId): array
    {
        return $this->connector->sevSend(new GetVoucherById($voucherId));
    }

    /**
     * @param int $voucherId ID of voucher to update
     */
    public function update(int $voucherId, array $data): array
    {
        return $this->connector->sevSend(new UpdateVoucher($voucherId, $data));
    }

    /**
     * @param int $voucherId ID of the voucher to enshrine
     */
    public function enshrine(int $voucherId): array
    {
        return $this->connector->sevSend(new VoucherEnshrine($voucherId));
    }

    /**
     * @param int $voucherId ID of voucher to book
     */
    public function book(int $voucherId, array $data): array
    {
        return $this->connector->sevSend(new BookVoucher($voucherId, $data));
    }

    /**
     * @param int $voucherId ID of the voucher to reset
     */
    public function resetToOpen(int $voucherId): array
    {
        return $this->connector->sevSend(new VoucherResetToOpen($voucherId));
    }

    /**
     * @param int $voucherId ID of the voucher to reset
     */
    public function resetToDraft(int $voucherId): array
    {
        return $this->connector->sevSend(new VoucherResetToDraft($voucherId));
    }

    public function getGuidanceForAllAccounts(): array
    {
        return $this->connector->sevSend(new ForAllAccounts());
    }

    /**
     * @param int $accountNumber The datev account number you want to get additional information of
     */
    public function getGuidanceForAccountNumber(int $accountNumber): array
    {
        return $this->connector->sevSend(new ForAccountNumber($accountNumber));
    }

    /**
     * @param string $taxRule The code of the tax rule you want to get guidance for.
     */
    public function getGuidanceForTaxRule(string $taxRule): array
    {
        return $this->connector->sevSend(new ForTaxRule($taxRule));
    }

    public function getGuidanceForRevenueAccounts(): array
    {
        return $this->connector->sevSend(new ForRevenue());
    }

    public function getGuidanceForExpenseAccounts(): array
    {
        return $this->connector->sevSend(new ForExpense());
    }
}
