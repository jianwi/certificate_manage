<?php


$factory->define(\App\Models\Template::class,function (Faker\Generator $faker){
   return [
       'name' => $faker->name,
        'content' => '<h1>${text1}</h1><h2>${text2}</h2>',
       'user_id' => $faker->randomNumber(),
       'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
   ];
});
