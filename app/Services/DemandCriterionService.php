<?php


namespace App\Services;


use App\Custom\PricePercentage;
use App\Repositories\DemandRepositoryInterface;
use App\Repositories\CriterionRepositoryInterface;


class DemandCriterionService implements DemandCriterionServiceInterface
{
    private $demandRepository, $criterionRepository;

    /**
     *
     * @param  \App\Repositories\DemandRepositoryInterface   $demandRepository
     * @param  \App\Repositories\CriterionRepositoryInterface  $criterionRepository
     *
     */
    public function __construct(DemandRepositoryInterface  $demandRepository, CriterionRepositoryInterface $criterionRepository)
    {
        $this->demandRepository = $demandRepository;
        $this->criterionRepository = $criterionRepository;
    }

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost  $request
     *
     */
    public function createDemandCriterion($request)
    {
        $request = $this->addPriceToRequest($request);
        $demandId = $this->demandRepository->create($request);
        $this->criterionRepository->create($request, $demandId);
    }

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost  $request
     * @return \App\Http\Requests\StoreCriterionPost
     */
    public function addPriceToRequest($request){
        $pricePercentage = new PricePercentage($request);
        return $pricePercentage->addPrice();
    }
}
