<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getReferenceCount
 *
 * Receive count reference
 */
class GetReferenceCount extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int $contactCustomFieldSettingId ID of contact field you want to get the reference count
     */
    public function __construct(
        protected int $contactCustomFieldSettingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomFieldSetting/{$this->contactCustomFieldSettingId}/getReferenceCount";
    }
}
