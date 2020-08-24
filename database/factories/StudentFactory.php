<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {

    static $roll = [];
    $standard_id =\App\Standard::inRandomOrder()->pluck('id')->first();

    if(isset($roll[$standard_id])) {
        $roll[$standard_id]++;
    } else {
        $roll[$standard_id] = 1;
    }

    return [
        'user_id' => factory(\App\User::class),
        'roll' => $roll[$standard_id],
        'standard_id' => $standard_id
    ];
});
