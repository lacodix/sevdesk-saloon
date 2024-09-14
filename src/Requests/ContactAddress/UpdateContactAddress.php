<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactAddress;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * updateContactAddress
 *
 * update a existing contact address.
 */
class UpdateContactAddress extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @param int $contactAddressId ID of contact address to return
     */
    public function __construct(
        protected int $contactAddressId,
        protected array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ContactAddress/{$this->contactAddressId}";
    }

    public function defaultBody(): array
    {
        return $this->data;
    }
}
