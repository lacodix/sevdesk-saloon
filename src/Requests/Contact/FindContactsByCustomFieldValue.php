<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * findContactsByCustomFieldValue
 *
 * Returns an array of contacts having a certain custom field value set.
 */
class FindContactsByCustomFieldValue extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string $value The value to be checked.
     * @param string|null $customFieldSettingid ID of ContactCustomFieldSetting for which the value has to be checked.
     * @param string|null $customFieldSettingobjectName Object name. Only needed if you also defined the ID of a ContactCustomFieldSetting.
     * @param string $customFieldName The ContactCustomFieldSetting name, if no ContactCustomFieldSetting is provided.
     */
    public function __construct(
        protected string $value,
        protected ?string $customFieldSettingid,
        protected ?string $customFieldSettingobjectName,
        protected string $customFieldName,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Contact/Factory/findContactsByCustomFieldValue';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'value' => $this->value,
            'customFieldSetting[id]' => $this->customFieldSettingid,
            'customFieldSetting[objectName]' => $this->customFieldSettingobjectName,
            'customFieldName' => $this->customFieldName,
        ]);
    }
}
