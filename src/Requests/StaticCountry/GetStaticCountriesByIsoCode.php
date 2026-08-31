<?php

namespace Lacodix\SevdeskSaloon\Requests\StaticCountry;

use InvalidArgumentException;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetStaticCountriesByIsoCode extends Request
{
    protected Method $method = Method::GET;

    protected string $iso2Code;

    public function __construct(string $iso2Code)
    {
        $normalizedCode = strtoupper(trim($iso2Code));

        if (preg_match('/^[A-Z]{2}$/D', $normalizedCode) !== 1) {
            throw new InvalidArgumentException('The country code must be an ISO 3166-1 alpha-2 code.');
        }

        $this->iso2Code = $normalizedCode;
    }

    public function resolveEndpoint(): string
    {
        return '/StaticCountry';
    }

    public function defaultQuery(): array
    {
        return ['code' => $this->iso2Code];
    }
}
