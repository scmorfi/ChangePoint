<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Price;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCriterionPost;
use App\Services\DemandCriterionServiceInterface;

class DemandCriteriaController extends Controller
{
    private $demandCriterionService ;

    /**
     *
     * @param  \App\Services\DemandCriterionServiceInterface   $demandCriterionService
     *
     */
    public function __construct(DemandCriterionServiceInterface $demandCriterionService)
    {
        $this->demandCriterionService = $demandCriterionService;
    }

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost  $request
     *
     */
    public function  store(StoreCriterionPost $request){
        $this->demandCriterionService->createDemandCriterion($request);
    }

}


