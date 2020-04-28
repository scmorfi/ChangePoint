<?php


namespace App\Repositories;


use App\Criterion;
use Ramsey\Uuid\Type\Integer;

class CriterionRepository implements CriterionRepositoryInterface
{
    private $criterionModel;

    /**
     *
     * @param  \App\Criterion $criterionModel
     *
     */
    public function __construct(Criterion $criterionModel)
    {
        $this->criterionModel = $criterionModel;
    }

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost $request
     * @param  Integer $demandId
     *
     */
    public function create($request, $demandId)
    {
        foreach ($request->criteria as $criterion){
            $this->criterionModel->create(["field" =>  $criterion['field'], "percent" => $criterion['percent'],"demand_id" => $demandId]);
        }
    }
}
