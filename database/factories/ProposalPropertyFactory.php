<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Proposal;
use App\ProposalProperty;
use Faker\Generator as Faker;

$factory->define(ProposalProperty::class, function (Faker $faker) {
    return [
        "field" => $faker->title,
        "value" => $faker->title,
        'Proposal_id' => function () {
            return factory(Proposal::class)->create()->id;
        },
    ];
});
