<?php

namespace Ensi\LaravelServeSwagger;

use Ensi\LaravelServeSwagger\Controllers\SwaggerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ServeSwaggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/serve-swagger.php', 'serve-swagger');
    }

    public function boot(): void
    {
        $this->publishes([__DIR__ . '/../config/serve-swagger.php' => config_path('serve-swagger.php')]);

        $this->loadViewsFrom(__DIR__ . '/views', 'serve-swagger');

        Route::namespace('Ensi\LaravelServeSwagger\Controllers')
            ->name('serve-swagger.')
            ->prefix(config('serve-swagger.path'))
            ->group(function () {
                Route::get('assets/{asset}/{ext}', [SwaggerController::class, 'asset'])->name('asset');
                Route::get('', [SwaggerController::class, 'documentation'])->name('documentation');
            });
    }
}
