<?php

namespace Lacodix\SevdeskSaloon\Resource;

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
use Saloon\Http\Response;

class Contact extends Resource
{
    public function getNextCustomerNumber(): Response
    {
        return $this->connector->send(new GetNextCustomerNumber());
    }

    /**
     * @param string $value The value to be checked.
     * @param string $customFieldSettingid ID of ContactCustomFieldSetting for which the value has to be checked.
     * @param string $customFieldSettingobjectName Object name. Only needed if you also defined the ID of a ContactCustomFieldSetting.
     * @param string $customFieldName The ContactCustomFieldSetting name, if no ContactCustomFieldSetting is provided.
     */
    public function findContactsByCustomFieldValue(
        string $value,
        ?string $customFieldSettingid,
        ?string $customFieldSettingobjectName,
        string $customFieldName,
    ): Response {
        return $this->connector->send(new FindContactsByCustomFieldValue($value, $customFieldSettingid, $customFieldSettingobjectName, $customFieldName));
    }

    /**
     * @param string $customerNumber The customer number to be checked.
     */
    public function contactCustomerNumberAvailabilityCheck(?string $customerNumber): Response
    {
        return $this->connector->send(new ContactCustomerNumberAvailabilityCheck($customerNumber));
    }

    /**
     * @param string $depth Defines if both organizations <b>and</b> persons should be returned.<br>
     *      '0' -> only organizations, '1' -> organizations and persons
     * @param string $customerNumber Retrieve all contacts with this customer number
     */
    public function getContacts(?string $depth, ?string $customerNumber): Response
    {
        return $this->connector->send(new GetContacts($depth, $customerNumber));
    }

    public function createContact(): Response
    {
        return $this->connector->send(new CreateContact());
    }

    /**
     * @param int $contactId ID of contact to return
     */
    public function getContactById(int $contactId): Response
    {
        return $this->connector->send(new GetContactById($contactId));
    }

    /**
     * @param int $contactId ID of contact to update
     */
    public function updateContact(int $contactId): Response
    {
        return $this->connector->send(new UpdateContact($contactId));
    }

    /**
     * @param int $contactId Id of contact resource to delete
     */
    public function deleteContact(int $contactId): Response
    {
        return $this->connector->send(new DeleteContact($contactId));
    }

    /**
     * @param int $contactId ID of contact to return
     */
    public function getContactTabsItemCountById(int $contactId): Response
    {
        return $this->connector->send(new GetContactTabsItemCountById($contactId));
    }
}
