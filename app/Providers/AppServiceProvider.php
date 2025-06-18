<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GitHubService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GitHubService::class, function ($app) {
            $token = env('GITHUB_PERSONAL_TOKEN');

            return new GitHubService($token);
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
