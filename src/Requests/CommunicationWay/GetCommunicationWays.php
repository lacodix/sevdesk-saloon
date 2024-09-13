<?php

namespace Lacodix\SevdeskSaloon\Requests\CommunicationWay;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getCommunicationWays
 *
 * Returns all communication ways which have been added up until now. Filters can be added.
 */
class GetCommunicationWays extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $contactid ID of contact for which you want the communication ways.
     * @param string|null $contactobjectName Object name. Only needed if you also defined the ID of a contact.
     * @param string|null $type Type of the communication ways you want to get.
     * @param string|null $main Define if you only want the main communication way.
     */
    public function __construct(
        protected ?string $contactid = null,
        protected ?string $contactobjectName = null,
        protected ?string $type = null,
        protected ?string $main = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/CommunicationWay';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'contact[id]' => $this->contactid,
            'contact[objectName]' => $this->contactobjectName,
            'type' => $this->type,
            'main' => $this->main,
        ]);
    }
}
