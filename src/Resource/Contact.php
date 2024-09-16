<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Enums\ContactType;
use Lacodix\SevdeskSaloon\Requests\Contact\ContactCustomerNumberAvailabilityCheck;
use Lacodix\SevdeskSaloon\Requests\Contact\CreateContact;
use Lacodix\SevdeskSaloon\Requests\Contact\DeleteContact;
use Lacodix\SevdeskSaloon\Requests\Contact\FindContactsByCustomFieldValue;
use Lacodix\SevdeskSaloon\Requests\Contact\GetContactById;
use Lacodix\SevdeskSaloon\Requests\Contact\GetContacts;
use Lacodix\SevdeskSaloon\Requests\Contact\GetContactTabsItemCountById;
use Lacodix\SevdeskSaloon\Requests\Contact\GetNextCustomerNumber;
use Lacodix\SevdeskSaloon\Requests\Contact\UpdateContact;
use Lacodix\SevdeskSaloon\Resource;

class Contact extends Resource
{
    public function getNextCustomerNumber(): array
    {
        return $this->connector->sevSend(new GetNextCustomerNumber());
    }

    public function findContactsByCustomFieldValue(
        string $value,
        ?string $customFieldName = null,
        ?string $customFieldSettingid = null,
        ?string $customFieldSettingobjectName = null,
    ): array {
        return $this->connector->sevSend(new FindContactsByCustomFieldValue($customFieldName, $value, $customFieldSettingid, $customFieldSettingobjectName));
    }

    public function customerNumberAvailabilityCheck(?string $customerNumber): array
    {
        return $this->connector->sevSend(new ContactCustomerNumberAvailabilityCheck($customerNumber));
    }

    public function get(?string $depth = null, ?string $customerNumber = null): array
    {
        return $this->connector->sevSend(new GetContacts($depth, $customerNumber));
    }

    public function create(ContactType $type, array $data): array
    {
        return $this->connector->sevSend(new CreateContact($type, $data));
    }

    public function createCustomer(array $data): array
    {
        return $this->create(ContactType::CUSTOMER, $data);
    }

    public function createSupplier(array $data): array
    {
        return $this->create(ContactType::SUPPLIER, $data);
    }

    public function createPartner(array $data): array
    {
        return $this->create(ContactType::PARTNER, $data);
    }

    public function createProspectCustomer(array $data): array
    {
        return $this->create(ContactType::PROSPECT_CUSTOMER, $data);
    }

    public function getById(int $contactId): array
    {
        return $this->connector->sevSend(new GetContactById($contactId));
    }

    public function update(int $contactId, array $data): array
    {
        return $this->connector->sevSend(new UpdateContact($contactId, $data));
    }

    public function delete(int $contactId): array
    {
        return $this->connector->sevSend(new DeleteContact($contactId));
    }

    public function getItemCountById(int $contactId): array
    {
        return $this->connector->sevSend(new GetContactTabsItemCountById($contactId));
    }
}
