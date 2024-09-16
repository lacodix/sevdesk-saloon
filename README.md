# sevdesk-saloon

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lacodix/sevdesk-saloon.svg?style=flat-square)](https://packagist.org/packages/lacodix/sevdesk-saloon)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lacodix/sevdesk-saloon/test.yaml?branch=main&label=tests&style=flat-square)](https://github.com/lacodix/sevdesk-saloon/actions?query=workflow%3Atest+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lacodix/sevdesk-saloon/style.yaml?branch=main&label=code%20style&style=flat-square)](https://github.com/lacodix/sevdesk-saloon/actions?query=workflow%3Astyle+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lacodix/sevdesk-saloon.svg?style=flat-square)](https://packagist.org/packages/lacodix/sevdesk-saloon)

## Documentation

** WORK IN PROGRESS _ DOCUMENTATION NOT READY **

You can find the entire documentation for this package on [our documentation site](https://www.lacodix.de/docs/sevdesk-saloon).

This package helps you to consume the Sevdesk API with your PHP projects. The package is based on Saloon
https://api.sevdesk.de/

## Installation

```bash
composer require lacodix/sevdesk-saloon
```

## Quickstart

Create an API Connector first. You have to provide some configuration data, to get the sevdesk api working. There 
are several settings that you'd have to set in all requests otherwise, like default tax rates and your api user id.

```php 
use Lacodix\SevdeskSaloon\SevdeskSaloon;

$sevdeskSaloon = new SevdeskSaloon(
    $api_token, // Your API Token - get it in your Sevdesk account
    [
        'sevUserId'   => 12345678,     // the Sevdesk Uer ID - needed to create invoices
        'taxRate'     => 19,
        'taxText'     => 'MwSt 19%',   // only in version 1.0
        'taxType'     => 'default',    // only in version 1.0
        'taxRule'     => 1,            // only in version 2.0
        'currency'    => 'EUR',
        'invoiceType' => 'RE',
    ]
);
```

## Get Your API User Id

Unfortunately Sevdesk doesn't show up the user ids on the UI. So you have to consume the API without configuration
for the first time. You can just run the following code (you need a valid token).

```php
    $sevdeskSaloon = new SevdeskSaloon($api_token);
    $sevdeskSaloon->sevUsers->get();
```

this will return an array of all sevUsers in your account. Take the ID and save it in your configuration.

```php 
[
    [
      "id" => "1234567",
      "objectName" => "SevUser",
      "additionalInformation" => null,
      "create" => ...,
      ...
    ]
]
```

## Consuming the Api

With the connector you can just consume all existing API resources

```php
    $sevdeskSaloon->contact()->get();
    $sevdeskSaloon->contact()->create($contactType, $contactData);
    
    $sevdeskSaloon->invoice()->get();
    $sevdeskSaloon->invoice()->create($sevContactId, $items, $data);
    $sevdeskSaloon->invoice()->sendViaEmail($invoiceId, $data);
``` 

## Mock API Calls in your tests

Since this package is based on Saloon, you can just use the MockClient to mock all requests in your tests.

See [Saloon Documentation](https://docs.saloon.dev/the-basics/testing#testing-your-application) for more information.

## Contributing

Please run the following commands and solve potential problems before committing
and think about adding tests for new functionality.

```bash
composer rector:test
composer insights
composer csfixer:test
composer phpstan:test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [lacodix](https://github.com/lacodix)
- [laravel Cameroon](https://github.com/laravelcm)

This package is inspired by [Laravel Subscriptions](https://github.com/laravelcm/laravel-subscriptions) created 
by Laravel Cameroon and was initially started as a fork of it. After several decisions to go different ways for
subscription calculation, it was rewritten from scratch, but still contains several simple methods and other code 
parts of the original. So if this package doesn't fit your needs, try a look into Laravel Cameroons subscription
package.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
