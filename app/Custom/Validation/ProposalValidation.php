<?php


namespace App\Custom\Validation;


use App\Repositories\ProposalPointrepositoryInterface;
use App\Repositories\ProposalRepositoryInterface;

class ProposalValidation implements ProposalValidationInterface
{

    private $proposalRepository;

    /**
     *
     * @param  \App\Repositories\ProposalRepositoryInterface $proposalRepository
     *
     */
    public function __construct(ProposalRepositoryInterface $proposalRepository)
    {
        $this->proposalRepository = $proposalRepository;
    }

    /**
     *
     * @param  Integer $proposalId
     *
     */
    public function  checkValidProposalId($proposalId){
        $proposal = $this->proposalRepository->findProposalFromAuth($proposalId);

        if(!count($proposal))
            abort(401, "message");
    }


}
