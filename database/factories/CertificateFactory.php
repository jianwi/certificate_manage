<?php

$factory->define(\App\Models\Certificate::class, function (Faker\Generator $faker) {
    $activity_ids = \App\Models\Activity::all()->pluck('id')->toArray();
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    $activity_id = $faker->randomElement($activity_ids);
    $activity_name = \App\Models\Activity::find($activity_id)->name;

    $award_ids = \App\Models\Award::where('activity_id',$activity_id)->pluck('id')->toArray();


    $first_names = ['杜', '雷', '李', '张', '王', '周', '马', '郭', '杨', '冯','胡','康','洪','刘','赵','秦','肖','蔡','曹'];
    $middle_names = ['一', '梦', '玉', '生', '铁', '沁', '欣', '小', '建','江','震','','','','','',''];
    $last_names = ['晗', '婷', '宇', '钰', '杰', '雨', '乐', '可', '雪', '梦', '瑶', '璐', '平', '靖', '峰', '康', '心', '云','茜'];

    $name = $faker->randomElement($first_names)
        . $faker->randomElement($middle_names)
        . $faker->randomElement($last_names);

    $award_id = $faker->randomElement($award_ids);
    $award_name = \App\Models\Award::find($award_id)->name;

    return [
        'name' => $name,
        'activity_id' => $activity_id,
        'code' => \Illuminate\Support\Str::upper(substr(md5(time() . uniqid()), 1, 8)),
        'award_id' => $award_id,
        'text1' => $name,
        'text2' => $activity_name,
        'text3' => $award_name,
        'user_id' => $faker->randomElement($user_ids),
        'created_at' => $faker->date . ' ' . $faker->time,
        'updated_at' => $faker->date . ' ' . $faker->time,
    ];
});
