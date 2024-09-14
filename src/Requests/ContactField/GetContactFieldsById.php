<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldsById
 *
 * Retrieve all contact fields
 */
class GetContactFieldsById extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $contactCustomFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactCustomField/{$this->contactCustomFieldId}";
    }
}
