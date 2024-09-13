<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContactfield
 *
 * Update a contact field
 */
class UpdateContactfield extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param float|int $contactCustomFieldId id of the contact field
     */
    public function __construct(
        protected float|int $contactCustomFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomField/{$this->contactCustomFieldId}";
    }
}
