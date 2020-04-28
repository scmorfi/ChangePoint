<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Criterion;
use App\Demand;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Criterion::class, function (Faker $faker) {
    return [
        'demand_id' => function () {
            return factory(Demand::class)->create()->id;
        },
        "field" => $faker->title,
        "percent" => $faker->numberBetween(0,100),
    ];
});
