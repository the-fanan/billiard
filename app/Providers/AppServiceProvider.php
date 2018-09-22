<?php

namespace billiard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use billiard\Constants\Constants;
use billiard\Constants\ResponseMessages as ResponseMessages;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*',function($view){
            /**
            * use constants and responsemessage as $constants::CONSTANT_NAME in view
            **/
            $view->with('auth', Auth::user())->with('constants', new Constants)->with('responseMessages', new ResponseMessages);
        });
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
