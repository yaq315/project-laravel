<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        view()->composer('*', function ($view) {
            $bookingId = null;
            
            if (auth()->check()) {
              
                $booking = auth()->user()->bookings()->latest()->first();
                $bookingId = $booking ? $booking->id : null;
            }
            
            $view->with('bookingId', $bookingId);
        });
    }
}
