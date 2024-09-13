<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\CommunicationWay\CreateCommunicationWay;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\DeleteCommunicationWay;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWayById;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWayKeys;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\GetCommunicationWays;
use Lacodix\SevdeskSaloon\Requests\CommunicationWay\UpdateCommunicationWay;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class CommunicationWay extends Resource
{
    /**
     * @param string $contactid ID of contact for which you want the communication ways.
     * @param string $contactobjectName Object name. Only needed if you also defined the ID of a contact.
     * @param string $type Type of the communication ways you want to get.
     * @param string $main Define if you only want the main communication way.
     */
    public function getCommunicationWays(
        ?string $contactid,
        ?string $contactobjectName,
        ?string $type,
        ?string $main,
    ): Response {
        return $this->connector->send(new GetCommunicationWays($contactid, $contactobjectName, $type, $main));
    }

    public function createCommunicationWay(): Response
    {
        return $this->connector->send(new CreateCommunicationWay());
    }

    /**
     * @param int $communicationWayId ID of communication way to return
     */
    public function getCommunicationWayById(int $communicationWayId): Response
    {
        return $this->connector->send(new GetCommunicationWayById($communicationWayId));
    }

    /**
     * @param int $communicationWayId ID of CommunicationWay to update
     */
    public function updateCommunicationWay(int $communicationWayId): Response
    {
        return $this->connector->send(new UpdateCommunicationWay($communicationWayId));
    }

    /**
     * @param int $communicationWayId Id of communication way resource to delete
     */
    public function deleteCommunicationWay(int $communicationWayId): Response
    {
        return $this->connector->send(new DeleteCommunicationWay($communicationWayId));
    }

    public function getCommunicationWayKeys(): Response
    {
        return $this->connector->send(new GetCommunicationWayKeys());
    }
}
