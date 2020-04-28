<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        "title" => $faker->company
    ];
});
