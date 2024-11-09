<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use App\Repositories\Interfaces\EMIRepositoryInterface;
use App\Repositories\LoanRepository;
use App\Repositories\EMIRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoanRepositoryInterface::class, LoanRepository::class);
        $this->app->bind(EMIRepositoryInterface::class, EMIRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
