<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Log all DB SELECT statements
        if (config('app.log_sql')) {
            DB::listen(function ($query) {
                if (preg_match('/^select/', $query->sql)) {
                    Log::info('sql: '.$query->sql);
                    // Also available are $query->bindings and $query->time.
                }
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
