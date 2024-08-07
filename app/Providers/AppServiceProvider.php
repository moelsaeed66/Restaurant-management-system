<?php

namespace App\Providers;

use App\Repositories\CartModelRepository;
use App\Repositories\CartRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public const HOME = '/home';

    public function register(): void
    {
        $this->app->bind(CartRepository::class, function () {
            return new CartModelRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
