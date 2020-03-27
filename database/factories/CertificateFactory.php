<?php

$factory->define(\App\Models\Certificate::class, function (Faker\Generator $faker) {
    $activity_ids = \App\Models\Activity::all()->pluck('id')->toArray();
    $award_ids = \App\Models\Award::all()->pluck('id')->toArray();
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    $first_names = ['杜', '雷', '李', '张', '王', '周', '马', '郭', '杨', '冯'];
    $middle_names = ['一', '梦', '玉', '生', '铁', '沁', '', '', ''];
    $last_names = ['晗', '婷', '宇', '钰', '杰', '雨', '乐', '可', '雪', '梦', '瑶', '璐', '平', '靖', '峰', '康', '心', '云'];

    $awards = ['年度最佳演员','送人头总冠军','投降第一人'];
    return [
        'name' => $first_names[random_int(0, count($first_names) - 1)]
            . $middle_names[random_int(0, count($middle_names) - 1)]
            . $last_names[random_int(0, count($last_names) - 1)],
        'activity_id' => $faker->randomElement($activity_ids),
        'code' => \Illuminate\Support\Str::upper(substr(md5(time() . uniqid()), 1, 8)),
        'award_id' => $faker->randomElement($award_ids),
        'text1' => $first_names[random_int(0, count($first_names) - 1)]
            . $middle_names[random_int(0, count($middle_names) - 1)]
            . $last_names[random_int(0, count($last_names) - 1)]
            ,
        'text2' => '寻找王者荣耀年度最坑队友',
        'text3' => $awards[random_int(0,2)],
        'creator' => $faker->randomElement($user_ids),
        'created_at' => $faker->date . ' ' . $faker->time,
        'updated_at' => $faker->date . ' ' . $faker->time,
    ];
});
