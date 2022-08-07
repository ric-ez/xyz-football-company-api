<?php

namespace App\Providers;

use App\Interfaces\MatchResultRepositoryInterface;
use App\Interfaces\TeamRepositoryInterface;
use App\Repositories\MatchResultRepository;
use App\Repositories\TeamRepository;
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
        $this->app->bind(
            MatchResultRepositoryInterface::class,
            MatchResultRepository::class,
        );
        $this->app->bind(
            TeamRepositoryInterface::class,
            TeamRepository::class
        );
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
