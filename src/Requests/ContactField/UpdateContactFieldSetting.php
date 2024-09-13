<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContactFieldSetting
 *
 * Update an existing contact field  setting
 */
class UpdateContactFieldSetting extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $contactCustomFieldSettingId ID of contact field setting you want to update
     */
    public function __construct(
        protected int $contactCustomFieldSettingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}";
    }
}
