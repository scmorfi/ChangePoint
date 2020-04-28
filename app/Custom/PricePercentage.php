<?php


namespace App\Custom;


use Ramsey\Uuid\Type\Integer;

class PricePercentage implements Price
{
    private $request;

    /**
     *
     * @param  \App\Http\Requests\StoreCriterionPost  $request
     *
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     *
     * @return  \App\Http\Requests\StoreCriterionPost
     *
     */
    public function addPrice(){
        $this->request->request->add(['price' => $this->getPricePercentage()]);
        return $this->request;
    }

    /**
     *
     * @return  Integer
     *
     */
    public function getPricePercentage(){
        return 100 - $this->sumPricePercentage();
    }

    /**
     *
     * @return  Integer
     *
     */
    public function sumPricePercentage(){
        return array_sum(array_column($this->request->criteria,"value"));
    }

}
