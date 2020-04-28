<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Proposal;
use App\Demand;
use  App\Company;
use Faker\Generator as Faker;

$factory->define(Proposal::class, function (Faker $faker) {
    return [
        'demand_id' => function () {
            return factory(Demand::class)->create()->id;
        },
        'company_id' => function () {
            return factory(Company::class)->create()->id;
        },
    ];
});
