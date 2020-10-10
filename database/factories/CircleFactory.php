<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Circle;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Circle::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'introduction' => $faker->realText(191),
        'prefecture_id' => 1,
        'detailedArea' => $faker->realText(191),
        'category_id' => $faker->numberBetween(1,8),
        'ageGroup' => $faker->numberBetween(0,5),
        'activityDay' => $faker->realText(191),
        'cost' => $faker->realText(191),
        'image' => 'dummy.jpg',
        'recruit_status' => $faker->numberBetween(0,1),
        'description_template' => $faker->realText(191),
        'request_required' => $faker->numberBetween(0,1),
        'private_status' => $faker->numberBetween(0,1),
        'admin_user_id' => User::inRandomOrder()->first()->id,
    ];
});
