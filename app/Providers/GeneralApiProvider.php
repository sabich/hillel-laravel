<?php

namespace App\Providers;

use App\Facades\GeneralApiFacade;
use Illuminate\Support\ServiceProvider;

class GeneralApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GeneralApiFacade::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
