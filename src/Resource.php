<?php

namespace Lacodix\SevdeskSaloon;

use Saloon\Http\Connector;

class Resource
{
    public function __construct(
        protected Connector $connector,
    ) {
    }
}
