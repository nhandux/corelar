<?php

namespace Nhanduc\Core;

/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : CoreServiceProvider.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    { 
        if(config('nhanduc.admin_view')) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'nhan');

            $this->app['router']->namespace('Nhanduc\\Core\\App\\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
                });
        }

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/nhanduc.php', 'nhanduc');
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__.'/Config/nhanduc.php' => config_path('nhanduc.php'),
            __DIR__ . '/Database/Migrations/' => database_path('migrations')
        ], 'nhanduc-setting');

        $this->publishes([
            __DIR__ . '/Resources/views/' => resource_path('views'),
            __DIR__.'/Resources/assets/' => public_path('admin_statics'),
        ], 'nhanduc-admin');
    }
} 
