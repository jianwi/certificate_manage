<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('templates')->delete();
        
        \DB::table('templates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '新型冠状肺炎',
                'content' => '<div
id = "cer"
style="
position: relative;
margin:auto;
width: 800px;
font-size:1.1em;
">
<img id=\'cer_img\' src="http://pan.jianwi.cn/zs-%E6%96%B0%E5%86%A0%E7%9F%A5%E8%AF%86%E7%AB%9E%E8%B5%9B.png"
style="
width:100%
">
<p style="
position: absolute;
font-size: 1.65rem;
top: 452px;
left: 129px;
"><b>${text1}同学：</b></p>

<h4 id=\'award\' style=\'
font-family:award;
text-align: center;
position: absolute;
top: 645px;
color:red;
font-size: 3.5em;
font-weight: 500;
width:100%;
text-align:center;
\'>${text2}</h4>


</div>
</div>',
                'image' => 'images/86b714db22034f8d23fe5833a5979258.png',
                'user_id' => 1,
                'created_at' => '2019-01-04 05:34:43',
                'updated_at' => '2020-04-29 23:19:39',
                0 => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '世界读书日',
                'content' => '<div
id = "cer"
style="
position: relative;
margin:auto;
width: 800px;
font-size:1.1em;
">
<img id=\'cer_img\' src="http://pan.jianwi.cn/zs-%E4%B8%96%E7%95%8C%E8%AF%BB%E4%B9%A6%E6%97%A5.png"
style="
width:100%
">
<p style="
position: absolute;
font-size: 1.65rem;
top: 452px;
left: 129px;
"><b>${text1}同学：</b></p>

<h4 id=\'award\' style=\'
font-family:award;
text-align: center;
position: absolute;
top: 645px;
color:red;
font-size: 3.5em;
font-weight: 500;
width:100%;
text-align:center;
\'>${text2}</h4>


</div>
</div>',
                'image' => NULL,
                'user_id' => 1,
                'created_at' => '2020-04-29 16:57:45',
                'updated_at' => '2020-04-29 23:20:49',
                0 => NULL,
            ),
            2 => 
            array (
                'id' => 2,
                'name' => '副本',
                'content' => '<div style="
position: relative;
max-width: 500px;
margin:auto;
font-size:1.1em;
">
<img src="http://pan.jianwi.cn/yiban.png" style="
width: 100%;
max-width: 500px;
">
<div style="position: absolute;top: 37%;left: 18%;width:64%">
<p><b>${text1}  同学：</b></p>
<p style=\'text-indent:2em\'><b>完成了由陕西高校网络思想政治工作中心举办的新冠肺炎疫情防控网络知识竞赛并荣获
</b></p>

<h4 style=\'text-align:center\'>${text2}</h4>
<p style=\'text-indent:2em\'><b>特颁此证，以资鼓励</b></p>
<div style="
text-align: center;
">
<img width="95px" src="${qr_code}">
<p><small>证书编号: ${code}</small></p>
</div>

</div>
</div>',
                'image' => NULL,
                'user_id' => 3,
                'created_at' => '1984-01-24 06:39:24',
                'updated_at' => '2020-04-28 23:44:47',
                0 => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '厨神大赛',
                'content' => '<div
id = "cer"
style="
position: relative;
margin:auto;
width: 800px;
font-size:1.1em;
">
<img id=\'cer_img\' src="http://pan.jianwi.cn/zs-%E5%8E%A8%E7%A5%9E%E5%A4%A7%E8%B5%9B.png"
style="
width:100%
">
<p style="
position: absolute;
font-size: 1.65rem;
top: 452px;
left: 129px;
"><b>${text1}同学：</b></p>

<h4 id=\'award\' style=\'
font-family:award;
text-align: center;
position: absolute;
top: 645px;
color:red;
font-size: 3.5em;
font-weight: 500;
width:100%;
text-align:center;
\'>${text2}</h4>


</div>
</div>',
                'image' => NULL,
                'user_id' => 1,
                'created_at' => '2020-04-29 16:58:06',
                'updated_at' => '2020-04-29 23:28:17',
                0 => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '学习笔记',
                'content' => '<div
id = "cer"
style="
position: relative;
margin:auto;
width: 800px;
font-size:1.1em;
">
<img id=\'cer_img\' src="http://pan.jianwi.cn/zs-%E5%AD%A6%E4%B9%A0%E7%AC%94%E8%AE%B0.png"
style="
width:100%
">
<p style="
position: absolute;
font-size: 1.65rem;
top: 452px;
left: 129px;
"><b>${text1}同学：</b></p>

<h4 id=\'award\' style=\'
font-family:award;
text-align: center;
position: absolute;
top: 645px;
color:red;
font-size: 3.5em;
font-weight: 500;
width:100%;
text-align:center;
\'>${text2}</h4>


</div>
</div>',
                'image' => NULL,
                'user_id' => 1,
                'created_at' => '2020-04-29 17:18:27',
                'updated_at' => '2020-04-29 23:49:23',
                0 => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '地球保护日',
                'content' => '<div
id = "cer"
style="
position: relative;
margin:auto;
width: 800px;
font-size:1.1em;
">
<img id=\'cer_img\' src="http://pan.jianwi.cn/zs-%E4%B8%96%E7%95%8C%E5%9C%B0%E7%90%83%E6%97%A5.png"
style="
width:100%
">
<p style="
position: absolute;
font-size: 1.65rem;
top: 452px;
left: 129px;
"><b>${text1}同学：</b></p>

<h4 id=\'award\' style=\'
font-family:award;
text-align: center;
position: absolute;
top: 645px;
color:red;
font-size: 3.5em;
font-weight: 500;
width:100%;
text-align:center;
\'>${text2}</h4>


</div>
</div>',
                'image' => NULL,
                'user_id' => 1,
                'created_at' => '2020-04-29 23:52:29',
                'updated_at' => '2020-04-29 23:52:29',
                0 => NULL,
            ),
        ));
        
        
    }
}