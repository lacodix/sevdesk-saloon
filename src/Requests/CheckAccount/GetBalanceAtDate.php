<?php

namespace Lacodix\SevdeskSaloon\Requests\CheckAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getBalanceAtDate
 *
 * Get the balance, calculated as the sum of all transactions sevdesk knows, up to and including the
 * given date. Note that this balance does not have to be the actual bank account balance, e.g. if
 * sevdesk did not import old transactions.
 */
class GetBalanceAtDate extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $checkAccountId ID of check account
     * @param string $date Only consider transactions up to this date at 23:59:59
     */
    public function __construct(
        protected int $checkAccountId,
        protected string $date,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/CheckAccount/{$this->checkAccountId}/getBalanceAtDate";
    }

    public function defaultQuery(): array
    {
        return array_filter(['date' => $this->date]);
    }
}
