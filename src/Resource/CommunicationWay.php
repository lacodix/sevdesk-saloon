<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\CommunicationWay\CreateCommunicationWay;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\DeleteCommunicationWay;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWayById;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWayKeys;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWays;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\UpdateCommunicationWay;
use Lacodix\SevdeskSaloon\Resource;

class CommunicationWay extends Resource
{
    /**
     * @param string $contactid ID of contact for which you want the communication ways.
     * @param string $contactobjectName Object name. Only needed if you also defined the ID of a contact.
     * @param string $type Type of the communication ways you want to get.
     * @param string $main Define if you only want the main communication way.
     */
    public function get(
        ?string $contactid = null,
        ?string $contactobjectName = null,
        ?string $type = null,
        ?string $main = null,
    ): array {
        return $this->connector->sevSend(new GetCommunicationWays($contactid, $contactobjectName, $type, $main));
    }

    public function create(int $contactid, array $data): array
    {
        return $this->connector->sevSend(new CreateCommunicationWay($contactid, $data));
    }

    public function getById(int $communicationWayId): array
    {
        return $this->connector->sevSend(new GetCommunicationWayById($communicationWayId));
    }

    public function update(int $communicationWayId, array $data): array
    {
        return $this->connector->sevSend(new UpdateCommunicationWay($communicationWayId, $data));
    }

    public function delete(int $communicationWayId): array
    {
        return $this->connector->sevSend(new DeleteCommunicationWay($communicationWayId));
    }

    public function getKeys(): array
    {
        return $this->connector->sevSend(new GetCommunicationWayKeys());
    }
}
