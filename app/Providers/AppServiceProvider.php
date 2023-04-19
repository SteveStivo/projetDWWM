<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      //applique la détecttion de la langue locale pour affichage de la date. Obligé d'utiliser "translatedFormat()" dans la vue blade
      Carbon::setLocale(config('app.locale'));
    }
}
