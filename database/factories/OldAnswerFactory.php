<?php

use Faker\Generator as Faker;
use App\User;
use App\Question;
use Carbon\Carbon;

$factory->define(App\OldAnswer::class, function (Faker $faker) {
    return [
        'uid' => User::all()->random()->id,
        'qid'=> Question::all()->random()->id,
        'aid'=> random_int(0,1),
        'correct'=> random_int(0,1),
        'created_at'=>Carbon::now()->subMonths(rand(1,10))->subDays(rand(1, 25))->subHours(rand(1, 24))->subSeconds(rand(1,50)),
        'updated_at'=>Carbon::now()->subMonths(rand(1,10))->subDays(rand(1, 25))->subHours(rand(1, 24))->subSeconds(rand(1,50)),
    ];
});
