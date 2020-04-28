<?php


namespace App\Repositories;


interface ProposalRepositoryInterface
{
    public function findProposalFromAuth($proposalId);
}
