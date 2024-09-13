<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * updateContactAddress
 *
 * update a existing contact address.
 */
class UpdateContactAddress extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param int $contactAddressId ID of contact address to return
     */
    public function __construct(
        protected int $contactAddressId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactAddress/{$this->contactAddressId}";
    }
}
