<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activities')->delete();
        
        \DB::table('activities')->insert(array (
            0 => 
            array (
                'id' => 22,
                'name' => '世界地球',
                'content' => '地球',
                'user_id' => 1,
                'template_id' => 6,
                'created_at' => '2020-04-29 23:54:09',
                'updated_at' => '2020-04-29 23:54:09',
                0 => NULL,
            ),
            1 => 
            array (
                'id' => 21,
                'name' => '学习笔记大赛',
                'content' => '学习笔记',
                'user_id' => 1,
                'template_id' => 5,
                'created_at' => '2020-04-29 23:53:46',
                'updated_at' => '2020-04-29 23:53:46',
                0 => NULL,
            ),
            2 => 
            array (
                'id' => 20,
                'name' => '厨神大赛',
                'content' => '厨神大赛',
                'user_id' => 1,
                'template_id' => 4,
                'created_at' => '2020-04-29 23:29:10',
                'updated_at' => '2020-04-29 23:29:10',
                0 => NULL,
            ),
            3 => 
            array (
                'id' => 19,
                'name' => '最美书摘竞赛',
                'content' => '最美书摘竞赛',
                'user_id' => 1,
                'template_id' => 3,
                'created_at' => '2020-04-29 23:21:48',
                'updated_at' => '2020-04-29 23:21:48',
                0 => NULL,
            ),
            4 => 
            array (
                'id' => 16,
                'name' => '新冠肺炎知识竞赛',
                'content' => '新冠肺炎知识竞赛',
                'user_id' => 1,
                'template_id' => 1,
                'created_at' => '2020-04-28 23:49:20',
                'updated_at' => '2020-04-28 23:49:20',
                0 => NULL,
            ),
        ));
        
        
    }
}