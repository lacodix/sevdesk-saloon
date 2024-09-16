# sevdesk-saloon

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lacodix/sevdesk-saloon.svg?style=flat-square)](https://packagist.org/packages/lacodix/sevdesk-saloon)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lacodix/sevdesk-saloon/test.yaml?branch=master&label=tests&style=flat-square)](https://github.com/lacodix/sevdesk-saloon/actions?query=workflow%3Atest+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lacodix/sevdesk-saloon/style.yaml?branch=master&label=code%20style&style=flat-square)](https://github.com/lacodix/sevdesk-saloon/actions?query=workflow%3Astyle+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/lacodix/sevdesk-saloon.svg?style=flat-square)](https://packagist.org/packages/lacodix/sevdesk-saloon)

## Documentation

You can find the entire documentation for this package on [our documentation site](https://www.lacodix.de/docs/sevdesk-saloon).
Including several usecases with detailed explanation.

This package helps you to consume the Sevdesk API with your PHP projects. The package is based on Saloon
https://api.sevdesk.de/

## Installation

```bash
composer require lacodix/sevdesk-saloon
```

## Quickstart

To get familiar with all settings and possibilities, please see the more detailed examples. This is only
a very quick overview how the package can work.

### Subscribers

Add our HasSubscription Trait to any model.

```php 
use Lacodix\LaravelPlans\Models\Traits\HasSubscriptions;

class User extends Authenticatable {
    use HasSubscription;
    
    ...
}
```

### Plans and Features

Create a Plan with Features (the latter is optional, if you don't need feature functionality).

```php 
use Lacodix\LaravelPlans\Enums\Interval;
use Lacodix\LaravelPlans\Models\Feature;
use Lacodix\LaravelPlans\Models\Plan;

$myPlan = Plan::create([
    'slug' => 'my-plan',
    'name' => 'My Plan', // can also be locale-array - see Feature below
    'price' => 50.0,
    'active' => true,
    'billing_interval' => Interval::MONTH,
    'billing_period' => 1,
    'meta' => [
        'price_per_token' => 0.05,
    ],
]);

$myFeature = Feature::create([
    'slug' => 'tokens',
    'name' => [
        'de' => 'Zusätzliche Tokens',
        'en' => 'Additional Tokens',
    ],
]);

$myPlan->features()->attach($myFeature, [
    'value' => 1000,
    'resettable_period' => 1,
    'resettable_interval' => Interval::MONTH,
]);
```

### Subscribe and renew

```php 
// Subscribe to multiple plans
$user->subscribe($myPlan1, 'main');
$user->subscribe($myPlan2, 'addon');

// Change Subscription
$user->subscribe($myPlan3, 'main'); // will replace myPlan1 subscription

// Renew
$user->subscriptions()->first()->renew();

// Cancel
$user->subscriptions()->first()->cancel();
```

## Testing

```bash
composer test
```

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
