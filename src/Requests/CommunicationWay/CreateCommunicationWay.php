<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createCommunicationWay
 *
 * Creates a new contact communication way.
 */
class CreateCommunicationWay extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $contactId,
        protected array $data
    ) {
        $this->data['contact'] = [
            'id' => $contactId,
            'objectName' => 'Contact',
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/CommunicationWay';
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
