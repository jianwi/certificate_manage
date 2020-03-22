<?php

$factory->define(\App\Models\Certificate::class,function (Faker\Generator $faker){
    $activity_ids = \App\Models\Activity::all()->pluck('id')->toArray();
    $award_ids = \App\Models\Award::all()->pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'activity_id' => $faker->randomElement($activity_ids),
        'code' => \Illuminate\Support\Str::upper(substr(md5(time().uniqid()),1,8)),
        'award_id' => $faker->randomElement($award_ids),
        'text1' => 'text1',
        'text2' => 'text2',
        'text3' => 'text3',
        'created_at' => $faker->date.' '.$faker->time,
        'updated_at' => $faker->date.' '.$faker->time,
    ];
});
