<?php


namespace App\Repositories;


interface ProposalPointrepositoryInterface
{
    public function update($id,$point,$proposalid);

    public function findFromProposal($proposalPointId);
}
