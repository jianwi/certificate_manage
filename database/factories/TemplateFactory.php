<?php


$factory->define(\App\Models\Template::class,function (Faker\Generator $faker){
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    $template = '
<div  style="
    position: relative;
    width: 500px;
    height: 900px;
    margin:auto;
    background-image: url(\'/images/zs.png\');
    background-size: contain;
    background-repeat: no-repeat;
    padding: 50px;
    padding-top: 200px;
">
    <div class="mt-5 p-2">
        <h3><b>${text1}</b> 同学：</h3>
        <br>
        <p class="h4">您在 <b>${text2}</b> 活动中获得 <b>${text3}</b> 称号</p>
        <p class="mt-2"></p>
        <h3 class="text-center">特发此证，以资鼓励</h3>
        <div class="mt-2 text-center">
            <img width="100px" src="${qr_code}" id="qr_img" />
            <p class="mt-2">证书编号: <span id="code_container">${code}</span></p>
        </div>

    </div>
</div>

';

    return [
       'name' => $faker->name,
       'content' => $template,
       'user_id' => $faker->randomElement($user_ids),
       'created_at' => $faker->date.' '.$faker->time,
        'updated_at' => $faker->date.' '.$faker->time,
   ];
});
