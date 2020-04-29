<?php


namespace App\Services;


use Auth;
use Ramsey\Uuid\Type\Integer;
use App\Custom\Validation\ProposalValidationInterface;
use App\Repositories\ProposalPointrepositoryInterface;
use App\Custom\Validation\ProposalPointValidationInterface;


class ProposalPointService implements ProposalPointServiceInterface
{

    private $proposalPointrepository, $proposalValidation, $proposalPointValidation;



    /**
     *
     * @param  \App\Repositories\ProposalPointrepositoryInterface  $proposalPointrepository
     * @param  \App\Custom\Validation\ProposalValidationInterface $proposalValidation
     * @param  \App\Custom\Validation\ProposalPointValidationInterface $proposalPointValidation
     *
     */
    public function __construct(ProposalPointrepositoryInterface $proposalPointrepository, ProposalValidationInterface $proposalValidation, ProposalPointValidationInterface $proposalPointValidation)
    {
        $this->proposalPointrepository = $proposalPointrepository;

        $this->proposalValidation = $proposalValidation;
        $this->proposalPointValidation = $proposalPointValidation;

    }

    /**
     *
     * @param  \App\Http\Requests\StoreProposalPointPost  $request
     * @param  Integer $proposalId
     *
     */
    public function updateProposalPoint($request,$proposalId)
    {

        $this->proposalValidation->checkValidProposalId($proposalId);


        $this->proposalPointValidation->checkValidProposalPointId($request->data,$proposalId);


        foreach ($request->data as $propsalPoint){
            $this->proposalPointrepository->update($propsalPoint['proposal_point_id'],$propsalPoint['point'],$proposalId);
        }
    }



}
