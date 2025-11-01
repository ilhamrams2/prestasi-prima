<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Atur zona waktu dan bahasa Carbon ke Indonesia
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID.UTF-8');
    }
}
