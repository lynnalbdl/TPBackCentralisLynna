<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Hashers\Sha256Hasher;

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
        $hashingDriver = config('hashing.driver', 'sha256');
    }
}
