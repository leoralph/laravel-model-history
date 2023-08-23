<?php

namespace LeoRalph\ModelHistory;

use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__.'/../config/model-history.php' => config_path('model-history.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . "/database/migrations" => database_path("migrations"),
        ], 'migrations');
    }
}