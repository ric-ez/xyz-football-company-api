<?php

namespace App\Providers;

use App\Interfaces\MatchResultRepositoryInterface;
use App\Repositories\MatchResultRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MatchResultRepositoryInterface::class, MatchResultRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
