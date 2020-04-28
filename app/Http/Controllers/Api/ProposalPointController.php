<?php

namespace App\Http\Controllers\Api;

use App\Demand;
use App\Services\ProposalPointServiceInterface;
use Auth;
use App\Criterion;
use App\Http\Controllers\Controller;
use App\Proposal;
use App\ProposalPoint;
use App\Http\Requests\StoreProposalPointPost;
use Illuminate\Http\Request;

class ProposalPointController extends Controller
{
    private $proposalPointService;

    public function __construct(ProposalPointServiceInterface $proposalPointService)
    {
        $this->proposalPointService = $proposalPointService;
    }

    public function update(StoreProposalPointPost $request, $proposalId){
        $this->proposalPointService->updateProposalPoint($request, $proposalId);
    }
}
