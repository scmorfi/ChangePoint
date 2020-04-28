<?php


namespace App\Repositories;


use App\ProposalPoint;
use Ramsey\Uuid\Type\Integer;

class ProposalPointRepository implements ProposalPointrepositoryInterface
{
    private $proposalPoint;

    /**
     *
     * @param  \App\ProposalPoint $proposalPoint
     *
     */
    public function __construct(ProposalPoint $proposalPoint)
    {
        $this->proposalPoint = $proposalPoint;
    }

    /**
     *
     * @param  integer $id
     * @param  Integer $point
     * @param Integer $proposalid
     *
     */
    public function update($id,$point,$proposalid)
    {
        $this->proposalPoint->updateOrCreate(["id" => $id],["point" => $point,"proposal_id" => $proposalid]);
    }

    /**
     *
     * @param  integer $proposalPointid
     * @return object
     *
     */
    public function findFromProposal($proposalPointid){
        return $this->proposalPoint->where("proposal_id",$proposalPointid)->get();
    }
}
