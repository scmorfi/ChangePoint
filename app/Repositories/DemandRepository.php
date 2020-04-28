<?php


namespace App\Repositories;


use App\Criterion;
use App\Demand;
use App\Price;
use App\User;
use Auth;

class DemandRepository implements DemandRepositoryInterface
{
    /**
     *
     * @param  \App\Demand $demandModel
     *
     */
    public function __construct(Demand $demandModel)
    {
        $this->demandModel = $demandModel;
    }

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost $request
     * @return integer
     *
     */
    public function create($request){
        return $this->demandModel->create(["user_id" => Auth::user()->id])->id;
    }
}
