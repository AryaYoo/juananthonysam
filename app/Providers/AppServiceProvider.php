<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

if (! function_exists('asset_v')) {
    /**
     * Generate an asset path for the application with automatic cache-busting timestamp.
     */
    function asset_v(?string $path): string
    {
        if (! $path) {
            return '';
        }
        $realPath = public_path($path);
        $version = file_exists($realPath) ? filemtime($realPath) : null;
        return asset($path) . ($version ? '?v=' . $version : '');
    }
}

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
        Blade::directive('asset_v', function ($expression) {
            return "<?php echo asset_v($expression); ?>";
        });
    }
}
