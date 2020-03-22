<?php


$factory->define(\App\Models\Template::class,function (Faker\Generator $faker){
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    return [
       'name' => $faker->name,
        'content' => '<h1>${text1}</h1><h2>${text2}</h2>',
       'user_id' => $faker->randomElement($user_ids),
       'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
   ];
});
