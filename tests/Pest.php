<?php

use Lacodix\SevdeskSaloon\SevdeskSaloon;
use Saloon\Config;

Config::preventStrayRequests();

function connector(): SevdeskSaloon
{
    return new SevdeskSaloon('test-token', [
        'sevUserId' => 1,
        'taxRate' => 19,
        'taxText' => 'VAT 19%',
        'taxType' => 'default',
        'taxRule' => 1,
        'currency' => 'EUR',
        'invoiceType' => 'RE',
    ]);
}
