<?php

$factory->define(\App\Models\Activity::class,function (Faker\Generator $faker){
    $template_ids = \App\Models\Template::all()->pluck('id')->toArray();
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'content' => $faker->sentence(),
        'user_id' => $faker->randomElement($user_ids),
        'template_id' => $faker->randomElement($template_ids),
        'created_at' => $faker->date.' '.$faker->time,
        'updated_at' => $faker->date.' '.$faker->time,
    ];
});
