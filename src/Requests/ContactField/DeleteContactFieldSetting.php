<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContactFieldSetting
 */
class DeleteContactFieldSetting extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $contactCustomFieldSettingId Id of contact field to delete
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
