<?php


$factory->define(\App\Models\Template::class,function (Faker\Generator $faker){
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    $template = '
<div  style="
    position: relative;
    width: 500px;
    height: 900px;
    margin:auto;
    background-image: url(http://www.yiban.cn/public/renzheng/img/cert/2019-dc-completion.66736ae9.png);
    background-size: contain;
    background-repeat: no-repeat;
    padding: 50px;
    padding-top: 200px;
">
    <div class="mt-5 p-2 text-center">
        <h3>${text1}</h3>
        <p>${text2}</p>
        <div id="qrCode" class="mt-3">
            <img width="100px" src="${qr_code}" id="qr_img" />
        </div>
        <p>证书编号: <span id="code_container">${code}</span></p>
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
