<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\locations;
use Faker\Generator as Faker;

$factory->define(locations::class, function (Faker $faker) {
    return [
        'branch'=> 'Al-'
        
    ];
});
