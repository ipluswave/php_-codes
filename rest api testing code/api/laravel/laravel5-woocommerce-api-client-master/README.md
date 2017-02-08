# Laravel 5 WooCommerce API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pixelpeter/laravel5-woocommerce-api-client.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-woocommerce-api-client)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis Build](https://img.shields.io/travis/pixelpeter/laravel5-woocommerce-api-client/master.svg?style=flat-square)](https://travis-ci.org/pixelpeter/laravel5-woocommerce-api-client)
[![Scrutinizer Quality](https://img.shields.io/scrutinizer/g/pixelpeter/laravel5-woocommerce-api-client.svg?style=flat-square)](https://scrutinizer-ci.com/g/pixelpeter/laravel5-woocommerce-api-client)
[![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/pixelpeter/laravel5-woocommerce-api-client.svg?style=flat-square)](https://scrutinizer-ci.com/g/pixelpeter/laravel5-woocommerce-api-client)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/edfbddc6-ccbc-425c-9db8-726a5bc371e7.svg?style=flat-square)](https://insight.sensiolabs.com/projects/edfbddc6-ccbc-425c-9db8-726a5bc371e7)
[![Total Downloads](https://img.shields.io/packagist/dt/pixelpeter/laravel5-woocommerce-api-client.svg?style=flat-square)](https://packagist.org/packages/pixelpeter/laravel5-woocommerce-api-client)
[![Dependency Status](https://www.versioneye.com/user/projects/56f9414235630e0034fda5a5/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56f9414235630e0034fda5a5)
[![Coverage Status](https://coveralls.io/repos/github/pixelpeter/laravel5-woocommerce-api-client/badge.svg?branch=master)](https://coveralls.io/github/pixelpeter/laravel5-woocommerce-api-client?branch=master)

A simple Laravel 5 wrapper for the [official WooCommerce REST API PHP Library](https://github.com/woothemes/wc-api-php) from Automattic.

## Installation

### Step 1: Install Through Composer
``` bash
composer require pixelpeter/laravel5-woocommerce-api-client
```

### Step 2: Add the Service Provider
Add the service provider in `app/config/app.php`
```php
'provider' => [
    ...
    Pixelpeter\Woocommerce\WoocommerceServiceProvider::class,
    ...
];
```

### Step 3: Add the Facade
Add the alias in `app/config/app.php`
```php
'aliases' => [
    ...
    'Woocommerce' => Pixelpeter\Woocommerce\Facades\Woocommerce::class,
    ...
];
```

### Step 4: Customize configuration
You can directly edit the configuration in `config/woocommerce.php` or copy these values to your `.env` file.
```php
WOOCOMMERCE_STORE_URL=http://example.org
WOOCOMMERCE_CONSUMER_KEY=ck_your-consumer-key
WOOCOMMERCE_CONSUMER_SECRET=cs_your-consumer-secret
WOOCOMMERCE_VERIFY_SSL=false
WOOCOMMERCE_VERSION=v3
```

## Examples

### Get the index of all available endpoints
```php
use Woocommerce;

return Woocommerce::get('');
```

### View all orders
```php
use Woocommerce;

return Woocommerce::get('orders');
```

### View all completed orders created after a specific date
```php
use Woocommerce;

$data = [
    'status' => 'completed',
    'filter' => [
        'created_at_min' => '2016-01-14'
    ]
];

$result = Woocommerce::get('orders', $data);

foreach($result['orders'] as $order)
{
    // do something with $order
}

// you can also use array access
$orders = Woocommerce::get('orders', $data)['orders'];

foreach($orders as $order)
{
    // do something with $order
}

```

### Update a product
```php
use Woocommerce;

$data = [
    'product' => [
        'title' => 'Updated title'
    ]
];

return Woocommerce::put('products/1', $data);
```

### More Examples
Refer to [WooCommerce REST API Documentation](woothemes.github.io/woocommerce-rest-api-docs/) for more examples and documention.

## Testing
Run the tests with:
```bash
vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
