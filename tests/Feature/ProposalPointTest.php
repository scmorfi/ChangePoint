<?php

namespace Tests\Feature;

use App\Company;
use Auth;
use App\Criterion;
use App\Demand;
use App\Proposal;
use App\ProposalPoint;
use App\ProposalProperty;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProposalPointTest extends TestCase
{

    use  RefreshDatabase;

    private $proposal, $proposalPoint;

    public function setUp():void{
        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user, ['create-servers']);


        $demand = factory(Demand::class)->create(["user_id" => Auth::user()->id]);
        $criteria = factory(Criterion::class,3)->create();

        $this->proposal = factory(Proposal::class)->create(['demand_id' => $demand->id]);

        foreach ($criteria as $key => $criterion)
            factory(ProposalPoint::class)->create(['criterion_id' => $criterion->id, "point" => 0, "proposal_id" => $this->proposal->id]);

        $this->proposalPoint = ProposalPoint::get();


    }



    /** @test */
    public function check_set_new_points()
    {



        $response = $this->json("post","/api/proposal/point/update/".$this->proposal->id,[

            "data" => [
                [
                    "proposal_point_id" => $this->proposalPoint[0]->id,
                    "point" => 10
                ],[
                    "proposal_point_id" => $this->proposalPoint[1]->id,
                    "point" => 20
                ],[
                    "proposal_point_id" => $this->proposalPoint[2]->id,
                    "point" => 20
                ]
            ]

        ]);

        $response->assertStatus(200);


    }

    /** @test */
    public function check_Proposal_point_invalid_propsal_id()
    {


        $response = $this->json("post","/api/proposal/point/update/invalidPersonalId",[
            "data" => [
                [
                    "proposal_point_id" => $this->proposalPoint[0]->id,
                    "point" => 10
                ],[
                    "proposal_point_id" => $this->proposalPoint[1]->id,
                    "point" => 20
                ],[
                    "proposal_point_id" => $this->proposalPoint[2]->id,
                    "point" => 20
                ]
            ]

        ]);

        $response->assertStatus(401);


    }



    /** @test */
    public function check_set_new_points_invalid_point()
    {

        $response = $this->json("post","/api/proposal/point/update/".$this->proposal->id,[
            "data" => [
                [
                    "proposal_point_id" => $this->proposalPoint[0]->id,
                    "point" => 120
                ],[
                    "proposal_point_id" => $this->proposalPoint[1]->id,
                    "point" => 20
                ],[
                    "proposal_point_id" => $this->proposalPoint[2]->id,
                    "point" => 20
                ]
            ]

        ]);

        $response->assertStatus(422);
    }

    /** @test */
    public function check_set_new_points_require_criterion_id()
    {

        $response = $this->json("post","/api/proposal/point/update/".$this->proposal->id,[
            "data" => [
                [
                    "proposal_point_id" => $this->proposalPoint[0]->id,
                    "point" => 50
                ],[
                    "proposal_point_id" => $this->proposalPoint[1]->id,
                    "point" => 20
                ]
            ]

        ]);
        $response->assertStatus(402);
    }

}
