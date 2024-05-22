<?php

namespace Ensi\LaravelServeSwagger\Tests;

use Ensi\LaravelServeSwagger\ServeSwaggerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ServeSwaggerServiceProvider::class,
        ];
    }
}
