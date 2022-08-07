<?php

namespace App\Providers;

use App\Interfaces\MatchResultRepositoryInterface;
use App\Interfaces\MatchScoreRepositoryInterface;
use App\Interfaces\ScheduleRepositoryInterface;
use App\Interfaces\TeamRepositoryInterface;
use App\Repositories\MatchResultRepository;
use App\Repositories\MatchScoreRepository;
use App\Repositories\ScheduleRepository;
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
        $this->app->bind(
            ScheduleRepositoryInterface::class,
            ScheduleRepository::class
        );
        $this->app->bind(
            MatchScoreRepositoryInterface::class,
            MatchScoreRepository::class
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
