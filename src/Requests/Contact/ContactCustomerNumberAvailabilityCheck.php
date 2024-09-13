<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * contactCustomerNumberAvailabilityCheck
 *
 * Checks if a given customer number is available or already used.
 */
class ContactCustomerNumberAvailabilityCheck extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $customerNumber The customer number to be checked.
     */
    public function __construct(
        protected ?string $customerNumber = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Contact/Mapper/checkCustomerNumberAvailability';
    }

    public function defaultQuery(): array
    {
        return array_filter(['customerNumber' => $this->customerNumber]);
    }
}
