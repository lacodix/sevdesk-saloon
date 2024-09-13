<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldSettingById
 *
 * Returns a single contact field setting
 */
class GetContactFieldSettingById extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $contactCustomFieldSettingId ID of contact field to return
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
