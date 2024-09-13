<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContactCustomFieldId
 */
class DeleteContactCustomFieldId extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $contactCustomFieldId Id of contact field
     */
    public function __construct(
        protected int $contactCustomFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomField/{$this->contactCustomFieldId}";
    }
}
