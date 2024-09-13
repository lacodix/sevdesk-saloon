<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getRelatedObjects
 *
 * Get related objects of a specified order
 */
class GetRelatedObjects extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $orderId ID of order to return the positions
     * @param bool|null $includeItself Define if the related objects include the order itself
     * @param bool|null $sortByType Define if you want the related objects sorted by type
     * @param array|null $embed Get some additional information. Embed can handle multiple values, they must be separated by comma.
     */
    public function __construct(
        protected int $orderId,
        protected ?bool $includeItself = null,
        protected ?bool $sortByType = null,
        protected ?array $embed = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/Order/{$this->orderId}/getRelatedObjects";
    }

    public function defaultQuery(): array
    {
        return array_filter(['includeItself' => $this->includeItself, 'sortByType' => $this->sortByType, 'embed' => $this->embed]);
    }
}
