<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Circle;
use Faker\Generator as Faker;

$factory->define(Circle::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'introduction' => $faker->realText(191),
        'prefecture_id' => 2,
        'detailedArea' => $faker->realText(191),
        'category_id' => 2,
        'ageGroup' => 1,
        'activityDay' => $faker->realText(191),
        'cost' => $faker->realText(191),
        'image' => $faker->text(191),
        'recruit_status' => 1,
        'description_template' => $faker->realText(191),
        'request_required' => 0,
        'private_status' => 0,
        'admin_user_id' => 1,
    ];
});
