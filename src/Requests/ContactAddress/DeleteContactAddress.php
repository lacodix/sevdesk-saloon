<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteContactAddress
 */
class DeleteContactAddress extends Request
{
    protected Method $method = Method::DELETE;

    /**
     * @param int $contactAddressId Id of contact address resource to delete
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
