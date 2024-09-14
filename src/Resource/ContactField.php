<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\ContactField\CreateContactField;
use Lacodix\SevdeskSaloon\Requests\ContactField\CreateContactFieldSetting;
use Lacodix\SevdeskSaloon\Requests\ContactField\DeleteContactCustomFieldId;
use Lacodix\SevdeskSaloon\Requests\ContactField\DeleteContactFieldSetting;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetContactFields;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetContactFieldsById;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetContactFieldSettingById;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetContactFieldSettings;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetPlaceholder;
use Lacodix\SevdeskSaloon\Requests\ContactField\GetReferenceCount;
use Lacodix\SevdeskSaloon\Requests\ContactField\UpdateContactfield;
use Lacodix\SevdeskSaloon\Requests\ContactField\UpdateContactFieldSetting;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class ContactField extends Resource
{
    public function getPlaceholder(string $objectName, ?string $subObjectName): array
    {
        return $this->connector->sevSend(new GetPlaceholder($objectName, $subObjectName));
    }

    public function get(): array
    {
        return $this->connector->sevSend(new GetContactFields());
    }

    public function create(int $contactId, array $data): array
    {
        return $this->connector->sevSend(new CreateContactField($contactId, $data));
    }

    public function getById(int $contactCustomFieldId): array
    {
        return $this->connector->sevSend(new GetContactFieldsById($contactCustomFieldId));
    }

    public function update(int $contactCustomFieldId, array $data): array
    {
        return $this->connector->sevSend(new UpdateContactfield($contactCustomFieldId, $data));
    }

    public function delete(int $contactCustomFieldId): array
    {
        return $this->connector->sevSend(new DeleteContactCustomFieldId($contactCustomFieldId));
    }

    public function getSettings(): array
    {
        return $this->connector->sevSend(new GetContactFieldSettings());
    }

    public function createSetting(array $data): array
    {
        return $this->connector->sevSend(new CreateContactFieldSetting($data));
    }

    public function getSettingById(int $contactCustomFieldSettingId): array
    {
        return $this->connector->sevSend(new GetContactFieldSettingById($contactCustomFieldSettingId));
    }

    public function updateSetting(int $contactCustomFieldSettingId, array $data): array
    {
        return $this->connector->sevSend(new UpdateContactFieldSetting($contactCustomFieldSettingId, $data));
    }

    public function deleteSetting(int $contactCustomFieldSettingId): array
    {
        return $this->connector->sevSend(new DeleteContactFieldSetting($contactCustomFieldSettingId));
    }

    public function getReferenceCount(int $contactCustomFieldSettingId): array
    {
        return $this->connector->sevSend(new GetReferenceCount($contactCustomFieldSettingId));
    }
}
