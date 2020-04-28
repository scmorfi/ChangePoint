<?php

namespace App\Http\Controllers\Api;

use App\Criterion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCriterionPost;
use App\Demand;
use App\Price;

use App\Services\DemandCriterionServiceInterface;
use Auth;
class DemandCriteriaController extends Controller
{
    private $demandCriterionService ;

    public function __construct(DemandCriterionServiceInterface $demandCriterionService)
    {
        $this->demandCriterionService = $demandCriterionService;
    }

    public function  store(StoreCriterionPost $request){
        $this->demandCriterionService->createDemandCriterion($request);
    }

}


