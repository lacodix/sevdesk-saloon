<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * contactAddressId
 *
 * Returns a single contact address
 */
class ContactAddressId extends Request
{
    protected Method $method = Method::GET;

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
