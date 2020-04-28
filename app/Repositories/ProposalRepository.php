<?php


namespace App\Repositories;


use App\Proposal;
use Auth;

class ProposalRepository implements ProposalRepositoryInterface
{
    private $proposal;

    /**
     *
     * @param  \App\Proposal $proposal
     *
     */
    public function __construct(Proposal $proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     *
     * @param  integer $proposalId
     * @return  object
     *
     */
    public function findProposalFromAuth($proposalId)
    {
        return $this->proposal->where("id",$proposalId)->whereHas("demand",function($q){
            $q->where("user_id",Auth::user()->id);
        })->get();
    }
}
