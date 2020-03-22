<?php

$factory->define(\App\Models\Award::class, function (Faker\Generator $faker) {
    $activity_ids = \App\Models\Activity::all()->pluck('id')->toArray();
    $items = ['一等奖','二等奖','三等奖','安慰奖','亚军','冠军','特等奖'];
    return [
        'name' => $faker->randomElement($items),
        'content' => $faker->sentence(),
        'activity_id' => $faker->randomElement($activity_ids),
        'created_at' => $faker->date . ' ' . $faker->time,
        'updated_at' => $faker->date . ' ' . $faker->time,
    ];
});
