<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactFields
 *
 * Retrieve all contact fields
 */
class GetContactFields extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ContactCustomField';
    }
}
