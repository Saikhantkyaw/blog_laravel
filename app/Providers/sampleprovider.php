<?php

namespace App\Providers;
use App\Test;
use Illuminate\Support\ServiceProvider;

class sampleprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //  $this->app->bind('test',function(){
        //         return new Test();
        //  });
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
