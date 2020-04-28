<?php


namespace App\Custom\Validation;


use App\Repositories\ProposalPointrepositoryInterface;
use App\Repositories\ProposalRepositoryInterface;

class ProposalPointValidation implements ProposalPointValidationInterface
{

    private $proposalPointrepository;

    /**
     *
     * @param  \App\Repositories\ProposalPointrepositoryInterface  $proposalPointrepository
     *
     */
    public function __construct(ProposalPointrepositoryInterface $proposalPointrepository)
    {
        $this->proposalPointrepository = $proposalPointrepository;

    }

    /**
     *
     * @param  Integer  $requestData
     * @param  Integer $proposalId
     *
     */
    public function checkValidProposalPointId($requestData,$proposalId){

        $requestData = $this->requestDataUnique($requestData);
        $propsalPoints = $this->proposalPointrepository->findFromProposal($proposalId);
        $this->checkCountRequestData($propsalPoints,$requestData);


        for ($i=0;$i<count($propsalPoints);$i++)
            if(array_search($propsalPoints[$i]->id,$requestData)===false)
                abort(402);
    }

    /**
     *
     * @param  Array  $requestData
     * @return  Array
     *
     */
    public function requestDataUnique($requestData){
        return array_unique(array_column($requestData,"proposal_point_id"));
    }

    /**
     *
     * @param  Object  $propsalPoints
     * @param   Array $requestData
     *
     */
    public function checkCountRequestData($propsalPoints,$requestData){
        if(count($propsalPoints) != count($requestData))
            abort(402);
    }
}
