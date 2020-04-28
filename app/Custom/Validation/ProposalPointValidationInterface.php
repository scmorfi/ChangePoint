<?php


namespace App\Custom\Validation;


interface ProposalPointValidationInterface
{
    public function checkValidProposalPointId($requestData,$proposalId);
}
