<?php

namespace App\Providers;


use App\Custom\Validation\ProposalPointValidation;
use App\Custom\Validation\ProposalPointValidationInterface;
use App\Custom\Validation\ProposalValidation;
use App\Custom\Validation\ProposalValidationInterface;
use App\Services\DemandCriterionService;
use App\Services\DemandCriterionServiceInterface;
use App\Services\ProposalPointService;
use App\Services\ProposalPointServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            DemandCriterionServiceInterface::class,
            DemandCriterionService::class
        );
        $this->app->bind(
            ProposalPointServiceInterface::class,
            ProposalPointService::class
        );
        $this->app->bind(
            ProposalValidationInterface::class,
            ProposalValidation::class
        );
        $this->app->bind(
            ProposalPointValidationInterface::class,
            ProposalPointValidation::class
        );
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
