<?php

namespace LeoRalph\ModelHistory;

use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/model-history.php' => config_path('model-history.php'),
        ], 'config');
    }
}