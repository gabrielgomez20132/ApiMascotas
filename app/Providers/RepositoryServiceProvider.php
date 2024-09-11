<?php

namespace App\Providers;

use App\Repositories\StudentRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\StudentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
