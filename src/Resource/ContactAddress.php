<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\ContactAddress\ContactAddressId;
use Lacodix\SevdeskSaloon\Requests\ContactAddress\CreateContactAddress;
use Lacodix\SevdeskSaloon\Requests\ContactAddress\DeleteContactAddress;
use Lacodix\SevdeskSaloon\Requests\ContactAddress\GetContactAddresses;
use Lacodix\SevdeskSaloon\Requests\ContactAddress\UpdateContactAddress;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class ContactAddress extends Resource
{
    public function getContactAddresses(): Response
    {
        return $this->connector->send(new GetContactAddresses());
    }

    public function createContactAddress(): Response
    {
        return $this->connector->send(new CreateContactAddress());
    }

    /**
     * @param int $contactAddressId ID of contact address to return
     */
    public function contactAddressId(int $contactAddressId): Response
    {
        return $this->connector->send(new ContactAddressId($contactAddressId));
    }

    /**
     * @param int $contactAddressId ID of contact address to return
     */
    public function updateContactAddress(int $contactAddressId): Response
    {
        return $this->connector->send(new UpdateContactAddress($contactAddressId));
    }

    /**
     * @param int $contactAddressId Id of contact address resource to delete
     */
    public function deleteContactAddress(int $contactAddressId): Response
    {
        return $this->connector->send(new DeleteContactAddress($contactAddressId));
    }
}
