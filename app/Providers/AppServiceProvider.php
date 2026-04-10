<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\News;

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
    public function boot(): void
    {
        // Mengirim $draftCount hanya ke file sidebar
        View::composer('components.sidebar', function ($view) {
            $view->with('draftCount', News::whereNull('published_at')->count());
        });
    }
}
