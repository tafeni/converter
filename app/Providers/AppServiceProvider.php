<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['customer.*','home.*'],function ($view){
            $user = Auth::user();
            if($user){
                $view->with(['username' => $user->name]);
            }
            else{
                $view->with(['username' => '']);
            }
        });
    }
}