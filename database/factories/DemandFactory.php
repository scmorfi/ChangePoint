<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demand;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Demand::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
