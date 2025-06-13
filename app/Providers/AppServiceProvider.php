<?php

namespace App\Providers;

use App\Services\Contracts\TaskAssignmentServiceInterface;
use App\Services\TaskAssignmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskAssignmentServiceInterface::class, TaskAssignmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
