<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Auth;
use App\Book;
use App\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
   
     //$categories = Category::all();
    //View::share('categories' , $categories);
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
