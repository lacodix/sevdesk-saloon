<?php

namespace Lacodix\SevdeskSaloon\Requests\Contact;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getContacts
 *
 * There are a multitude of parameter which can be used to filter.<br>
 *      A few of them are attached
 * but
 *      for a complete list please check out <a
 * href='#tag/Contact/How-to-filter-for-certain-contacts'>this</a> list
 */
class GetContacts extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string|null $depth Defines if both organizations <b>and</b> persons should be returned.<br>
     *      '0' -> only organizations, '1' -> organizations and persons
     * @param string|null $customerNumber Retrieve all contacts with this customer number
     */
    public function __construct(
        protected ?string $depth = null,
        protected ?string $customerNumber = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Contact';
    }

    public function defaultQuery(): array
    {
        return array_filter(['depth' => $this->depth, 'customerNumber' => $this->customerNumber]);
    }
}
