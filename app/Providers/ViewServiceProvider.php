<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('dashboard.admin.partials.sidebar', function ($view) {
            $view->with('adminData', Auth::user());
        });

        View::composer('dashboard.admin.partials.header', function ($view) {
            $view->with('adminData', Auth::user());
        });
    }
}
