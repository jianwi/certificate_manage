<?php

$factory->define(\App\Models\Activity::class,function (Faker\Generator $faker){
    $template_ids = \App\Models\Template::all()->pluck('id')->toArray();
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();
    $activity_names = ['创意大赛', '创新杯', '优秀学生评选', '年度最佳团员', '年度最可爱的人'];

    return [
        'name' => '第'.$faker->randomNumber(4).'届'.$faker->randomElement($activity_names),
        'content' => $faker->sentence(),
        'user_id' => $faker->randomElement($user_ids),
        'template_id' => $faker->randomElement($template_ids),
        'created_at' => $faker->date.' '.$faker->time,
        'updated_at' => $faker->date.' '.$faker->time,
    ];
});
