<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // If you are running lower version of MySQL then you may get 
        // following error : 1071 Specified key was too long; 
        // max key length is 767 bytes
        // To fix this, I'm setting max string length of all db fields 
        // by default to 191
        // Schema::defaultStringLength(191); 
        // Solved by decreasing StringLength to 191 instead of by default 255
        // Add this custom validation rule.
        Validator::extend('alpha_spaces', function ($attribute, $value) {

            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value);

        });
    }
}
