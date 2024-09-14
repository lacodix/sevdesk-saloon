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
    public function get(): array
    {
        return $this->connector->sevSend(new GetContactAddresses());
    }

    public function create(int $contactId, array $data): array
    {
        return $this->connector->sevSend(new CreateContactAddress($contactId, $data));
    }

    public function getById(int $contactAddressId): array
    {
        return $this->connector->sevSend(new ContactAddressId($contactAddressId));
    }

    public function update(int $contactAddressId, array $data): array
    {
        return $this->connector->sevSend(new UpdateContactAddress($contactAddressId, $data));
    }

    public function delete(int $contactAddressId): array
    {
        return $this->connector->sevSend(new DeleteContactAddress($contactAddressId));
    }
}
