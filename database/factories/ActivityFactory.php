<?php

$factory->define(\App\Models\Activity::class,function (Faker\Generator $faker){
    $template_ids = \App\Models\Template::all()->pluck('id')->toArray();
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();
    $activity_names = ['校园文化节', '寝室文化节', '最佳宿舍评选', '王者荣耀最佳演员', '最可爱的人'];

    return [
        'name' => '第'.$faker->randomNumber(4).'届'.$faker->randomElement($activity_names),
        'content' => $faker->sentence(),
        'user_id' => $faker->randomElement($user_ids),
        'template_id' => $faker->randomElement($template_ids),
        'created_at' => $faker->date.' '.$faker->time,
        'updated_at' => $faker->date.' '.$faker->time,
    ];
});
