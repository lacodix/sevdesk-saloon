<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFieldSettings
 *
 * Retrieve all contact field settings
 */
class GetContactFieldSettings extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ContactCustomFieldSetting';
    }
}
