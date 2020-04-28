<?php

namespace Tests\Feature;


use App\Criterion;
use App\Demand;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DemandTest extends TestCase
{
    use  DatabaseMigrations;

    private $postData = [ "criteria" => [
        [
            "field" => "weight",
            "percent" => "50"
        ],
        [
            "field" => "guaranty",
            "percent" => "30"
        ]
    ]];

    public function setUp():void{
        parent::setUp();

        $user = factory(User::class)->create();
        Passport::actingAs($user, ['create-servers']);


    }

    /** ٬@test */
    public function check_not_allow_price_field()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "quality",
                    "percent" => "70"
                ],
                [
                    "field" => "price",
                    "percent" => "10"
                ]
            ]]
        );


        return $response->assertStatus(422);
    }

    /** ٬@test */
    public function check_post_correct_information()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "quality",
                    "percent" => "50"
                ],
                [
                    "field" => "guaranty",
                    "percent" => "30"
                ]
            ]]
        );

        return $response->assertStatus(200);
    }

    /** ٬@test */
    public function check_the_value_of_all_fields()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "",
                    "percent" => "50"
                ],
                [
                    "field" => "guaranty",
                    "percent" => "30"
                ]
            ]]
        );

        return $response->assertStatus(422);
    }

    /** ٬@test */
    public function check_the_value_of_all_values()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "weight",
                    "percent" => "50"
                ],
                [
                    "field" => "guaranty",
                    "percent" => ""
                ]
            ]]
        );


        return $response->assertStatus(422);
    }

    /** ٬@test */
    public function check_the_number_of_all_values()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "weight",
                    "percent" => "50"
                ],
                [
                    "field" => "guaranty",
                    "percent" => "string"
                ]
            ]]
        );


        return $response->assertStatus(422);
    }

    /** ٬@test */
    public function Check_not_accepting_the_sum_of_values_above_one_hundred_percent()
    {

        $response = $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "quality",
                    "percent" => "70"
                ],
                [
                    "field" => "weight",
                    "percent" => "40"
                ]
            ]]
        );


        return $response->assertStatus(422);
    }


    /** ٬@test */
    public function check_create_criterion()
    {

        $this->postDemand(
            [ "criteria" => [
                [
                    "field" => "quality",
                    "percent" => "10"
                ],
                [
                    "field" => "guaranty",
                    "percent" => "40"
                ]
            ]]
        );

        return $this->assertEquals(Criterion::count(),2);
    }

    public function postDemand($parameters){
        $this->setParameters($parameters);
        return  $this->json("post","/api/demand/store",$this->postData);
    }

    public function setParameters($parameters){
        foreach ($parameters as $key => $para)
            $this->postData[$key] = $para;
    }



}
