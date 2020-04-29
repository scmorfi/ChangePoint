<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProposalPointPost;
use App\Services\ProposalPointServiceInterface;


class ProposalPointController extends Controller
{
    private $proposalPointService;

    /**
     *
     * @param  \App\Services\ProposalPointServiceInterface  $proposalPointService
     *
     */
    public function __construct(ProposalPointServiceInterface $proposalPointService)
    {
        $this->proposalPointService = $proposalPointService;
    }

    /**
     *
     * @param  \App\Http\Requests\StoreProposalPointPost  $request
     * @param integer $proposalId
     *
     */
    public function update(StoreProposalPointPost $request, $proposalId){
        $this->proposalPointService->updateProposalPoint($request, $proposalId);
    }
}
