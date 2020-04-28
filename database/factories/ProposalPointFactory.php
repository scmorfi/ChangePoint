<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demand;
use App\Model;
use App\Proposal;
use App\ProposalPoint;
use Faker\Generator as Faker;

$factory->define(ProposalPoint::class, function (Faker $faker) {
    return [
        'criterion_id' => function () {
            return factory(Proposal::class)->create()->id;
        },
        'point' => $faker->numberBetween(0,100),
        'proposal_id' => function () {
            return factory(Proposal::class)->create()->id;
        },
    ];
});
