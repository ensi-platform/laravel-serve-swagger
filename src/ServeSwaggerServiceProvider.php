<?php

namespace Greensight\LaravelServeSwagger;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ServeSwaggerServiceProvider extends ServiceProvider
{
    /**
     * Выполнение после-регистрационной загрузки сервисов.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/serve-swagger.php' => config_path('serve-swagger.php')]);
        $this->mergeConfigFrom(__DIR__ . '/../config/serve-swagger.php', 'serve-swagger');

        $this->loadViewsFrom(__DIR__ . '/views', 'serve-swagger');

        Route::namespace('Greensight\LaravelServeSwagger\Controllers')
            ->name('serve-swagger.')
            ->prefix(config('serve-swagger.path'))
            ->group(function () {
                Route::get('assets/{asset}/{ext}', 'SwaggerController@asset')->name('asset');
                Route::get('', 'SwaggerController@documentation')->name('documentation');
            });
    }
}