<?php
//https://medium.com/rajtechnologies/creating-your-own-php-helper-functions-in-laravel-custom-global-laravel-helpers-5d87562d1069
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
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

    protected function loadHelpers(){
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename){
            require_once $filename;
        }
    }
}
