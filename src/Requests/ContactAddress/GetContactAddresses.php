<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContactAddresses
 *
 * Retrieve all contact addresses
 */
class GetContactAddresses extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/ContactAddress';
    }
}
