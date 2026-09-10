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
        $this->app->bind(
            \App\Repositories\Contracts\EventRepositoryInterface::class,
            \App\Repositories\Eloquent\EventRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\GalleryRepositoryInterface::class,
            \App\Repositories\Eloquent\GalleryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\PrayerRequestRepositoryInterface::class,
            \App\Repositories\Eloquent\PrayerRequestRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
