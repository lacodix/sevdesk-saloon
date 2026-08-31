<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\StaticCountry\GetStaticCountriesByIsoCode;
use Lacodix\SevdeskSaloon\Resource;

class StaticCountry extends Resource
{
    public function getByIsoCode(string $iso2Code): array
    {
        return $this->connector->sevSend(new GetStaticCountriesByIsoCode($iso2Code));
    }
}
