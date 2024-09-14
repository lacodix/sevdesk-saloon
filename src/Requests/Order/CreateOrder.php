<?php

namespace Lacodix\SevdeskSaloon\Requests\Order;

use Exlo89\LaravelSevdeskApi\Constants\Country;
use Exlo89\LaravelSevdeskApi\Constants\OrderStatus;
use Lacodix\SevdeskSaloon\Enums\Countries;
use Lacodix\SevdeskSaloon\SevdeskSaloon;
use Lacodix\SevdeskSaloon\Traits\HasPositions;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createOrder
 *
 * Creates an order to which positions can be added later.
 */
class CreateOrder extends Request implements HasBody
{
    use HasJsonBody;
    use HasPositions;

    protected Method $method = Method::POST;
    protected array $sevdeskConfig;

    public function __construct(
        protected int $contactId,
        protected array $items,
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Order/Factory/saveOrder';
    }

    public function defaultBody(): array
    {
        return [
            'order'        => [
                'objectName'           => 'Order',
                'mapAll'               => 'true',
                'orderNumber'          => $this->data['orderNumber'] ?? null,
                'contact'              => [
                    'id'         => $this->contactId,
                    'objectName' => 'Contact'
                ],
                'orderDate'            => $this->data['orderDate'] ?? date('Y-m-d H:i:s'),
                'status'               => $this->data['status'] ?? OrderStatus::DRAFT->value,
                'header'               => $this->data['header'] ?? null,
                'headText'             => $this->data['headText'] ?? null,
                'footText'             => $this->data['footText'] ?? null,
                'addressCountry'       => [
                    'id'         => $this->data['country'] ?? Countries::GERMANY->value,
                    'objectName' => 'StaticCountry'
                ],
                'deliveryTerms'        => $this->data['deliveryTerms'] ?? null,
                'paymentTerms'         => $this->data['paymentTerms'] ?? null,
                'version'              => $this->data['version'] ?? 1,
                'smallSettlement'      => $this->data['smallSettlement'] ?? null,
                'contactPerson'        => [
                    'id'         => $this->sevdeskConfig['sevUserId'],
                    'objectName' => 'SevUser'
                ],
                // ==== only in version 1.0 ====
                'taxType'              => $this->data['taxType'] ?? $this->sevdeskConfig['taxType'],
                'taxSet'               => empty($this->data['taxSetId']) ? null : [
                    'id'         => $this->data['taxSetId'],
                    'objectName' => 'TaxSet'
                ],
                // ==== only in version 2.0 ====
                'taxRule'              => [
                    'id'         => $this->sevdeskConfig['taxRule'],
                    'objectName' => 'TaxRule',
                ],
                // =============================
                'taxRate'              => $this->data['taxRate'] ?? $this->sevdeskConfig['taxRate'],
                'taxText'              => $this->data['taxText'] ?? $this->sevdeskConfig['taxText'],
                'orderType'            => $this->data['orderType'],
                'sendDate'             => $this->data['sendDate'] ?? date('Y-m-d H:i:s'),
                'address'              => $this->data['address'] ?? null,
                'currency'             => $this->data['currency'] ?? $this->sevdeskConfig['currency'],
                'customerInternalNote' => $this->data['customerInternalNote'] ?? null,
                'showNet'              => $this->data['showNet'] ?? null,
                'sendType'             => $this->data['sendType'] ?? null,
                'origin'               => empty($this->data['originId']) || empty($this->data['originModel']) ? null : [
                    'id'         => $this->data['originId'],
                    'objectName' => $this->data['originModel'],
                ],
            ],
            'orderPosSave' => self::getPositions($this->items, $this->sevdeskConfig, 'order'),
        ];
    }

    public function setConfig(array $config): static
    {
        $this->sevdeskConfig = $config;

        return $this;
    }
}
