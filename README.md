# Laravel serve swagger

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ensi/laravel-serve-swagger.svg?style=flat-square)](https://packagist.org/packages/ensi/laravel-serve-swagger)
[![Tests](https://github.com/ensi-platform/laravel-serve-swagger/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/ensi-platform/laravel-serve-swagger/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ensi/laravel-serve-swagger.svg?style=flat-square)](https://packagist.org/packages/ensi/laravel-serve-swagger)

The package allows you to output the Swagger UI by configuring only the paths to your openapi3 configs

## Installation

You can install the package via composer:

```bash
composer require ensi/laravel-serve-swagger
```

Publish config file like this:

```bash
php artisan vendor:publish --provider="Ensi\LaravelServeSwagger\ServeSwaggerServiceProvider"
```

Configure `config/serve-swagger.php`

## Version Compatibility

| Laravel Serve Swagger | Laravel                              | PHP              |
|-----------------------|--------------------------------------|------------------|
| ^0.1.0                | ^5.8                                 | ^7.1.3           |
| ^0.1.7                | ^8.0                                 | ^7.1.3 \|\| ^8.0 |
| ^0.2.0                | ^8.0                                 | ^7.1.3 \|\| ^8.0 |
| ^0.3.0                | ^8.0                                 | ^7.1.3 \|\| ^8.0 |
| ^0.3.1                | ^8.0 \|\| ^9.0                       | ^8.0             |
| ^0.3.2                | ^8.0 \|\| ^9.0 \|\| ^10.0 \|\| ^11.0 | ^8.0             |
| ^0.4.0                | ^9.0 \|\| ^10.0 \|\| ^11.0           | ^8.1             |

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

### Testing

1. composer install
2. composer test

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
