<?php

namespace App\Providers;

use App\Repositories\CriterionRepository;
use App\Repositories\CriterionRepositoryInterface;
use App\Repositories\DemandRepositoryInterface;
use App\Repositories\DemandRepository;
use App\Repositories\ProposalPointRepository;
use App\Repositories\ProposalPointrepositoryInterface;
use App\Repositories\ProposalRepository;
use App\Repositories\ProposalRepositoryInterface;
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
            DemandRepositoryInterface::class,
            DemandRepository::class
        );
        $this->app->bind(
            CriterionRepositoryInterface::class,
            CriterionRepository::class
        );
        $this->app->bind(
            ProposalPointrepositoryInterface::class,
            ProposalPointRepository::class
        );
        $this->app->bind(
            ProposalRepositoryInterface::class,
            ProposalRepository::class
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
