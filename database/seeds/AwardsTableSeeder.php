<?php

use Illuminate\Database\Seeder;

class AwardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('awards')->delete();
        
        \DB::table('awards')->insert(array (
            0 => 
            array (
                'id' => 464,
                'name' => '一等奖',
                'content' => '一等奖',
                'activity_id' => 16,
                'created_at' => '2020-04-29 23:09:27',
                'updated_at' => '2020-04-29 23:09:27',
                0 => NULL,
            ),
            1 => 
            array (
                'id' => 465,
                'name' => '二等奖',
                'content' => '二等奖',
                'activity_id' => 16,
                'created_at' => '2020-04-29 23:09:28',
                'updated_at' => '2020-04-29 23:09:28',
                0 => NULL,
            ),
            2 => 
            array (
                'id' => 466,
                'name' => '三等奖',
                'content' => '三等奖',
                'activity_id' => 16,
                'created_at' => '2020-04-29 23:09:28',
                'updated_at' => '2020-04-29 23:09:28',
                0 => NULL,
            ),
            3 => 
            array (
                'id' => 467,
                'name' => '优秀奖',
                'content' => '优秀奖',
                'activity_id' => 16,
                'created_at' => '2020-04-29 23:09:28',
                'updated_at' => '2020-04-29 23:09:28',
                0 => NULL,
            ),
            4 => 
            array (
                'id' => 468,
                'name' => '一等奖',
                'content' => '一等奖',
                'activity_id' => 19,
                'created_at' => '2020-04-29 23:22:20',
                'updated_at' => '2020-04-29 23:22:20',
                0 => NULL,
            ),
            5 => 
            array (
                'id' => 469,
                'name' => '二等奖',
                'content' => '二等奖',
                'activity_id' => 19,
                'created_at' => '2020-04-29 23:22:20',
                'updated_at' => '2020-04-29 23:22:20',
                0 => NULL,
            ),
            6 => 
            array (
                'id' => 470,
                'name' => '三等奖',
                'content' => '三等奖',
                'activity_id' => 19,
                'created_at' => '2020-04-29 23:22:20',
                'updated_at' => '2020-04-29 23:22:20',
                0 => NULL,
            ),
            7 => 
            array (
                'id' => 471,
                'name' => '地球守护者荣誉证书',
                'content' => '地球守护者荣誉证书',
                'activity_id' => 22,
                'created_at' => '2020-04-29 23:54:33',
                'updated_at' => '2020-04-29 23:54:33',
                0 => NULL,
            ),
            8 => 
            array (
                'id' => 472,
                'name' => '参与奖',
                'content' => '参与奖',
                'activity_id' => 22,
                'created_at' => '2020-04-29 23:54:53',
                'updated_at' => '2020-04-29 23:54:53',
                0 => NULL,
            ),
            9 => 
            array (
                'id' => 473,
                'name' => '优秀奖',
                'content' => '优秀奖',
                'activity_id' => 21,
                'created_at' => '2020-04-29 23:56:26',
                'updated_at' => '2020-04-29 23:56:26',
                0 => NULL,
            ),
            10 => 
            array (
                'id' => 474,
                'name' => '一等奖',
                'content' => '一等奖',
                'activity_id' => 21,
                'created_at' => '2020-04-29 23:56:26',
                'updated_at' => '2020-04-29 23:56:26',
                0 => NULL,
            ),
            11 => 
            array (
                'id' => 475,
                'name' => '二等奖',
                'content' => '二等奖',
                'activity_id' => 21,
                'created_at' => '2020-04-29 23:56:26',
                'updated_at' => '2020-04-29 23:56:26',
                0 => NULL,
            ),
            12 => 
            array (
                'id' => 476,
                'name' => '三等奖',
                'content' => '三等奖',
                'activity_id' => 21,
                'created_at' => '2020-04-29 23:56:26',
                'updated_at' => '2020-04-29 23:56:26',
                0 => NULL,
            ),
            13 => 
            array (
                'id' => 477,
                'name' => '一等奖',
                'content' => '1',
                'activity_id' => 20,
                'created_at' => '2020-04-29 23:56:38',
                'updated_at' => '2020-04-30 00:07:41',
                0 => NULL,
            ),
            14 => 
            array (
                'id' => 478,
                'name' => '二等奖',
                'content' => '2',
                'activity_id' => 20,
                'created_at' => '2020-04-29 23:56:38',
                'updated_at' => '2020-04-30 00:07:41',
                0 => NULL,
            ),
            15 => 
            array (
                'id' => 479,
                'name' => '三等奖',
                'content' => '3',
                'activity_id' => 20,
                'created_at' => '2020-04-29 23:56:38',
                'updated_at' => '2020-04-30 00:07:41',
                0 => NULL,
            ),
            16 => 
            array (
                'id' => 480,
                'name' => '参与奖',
                'content' => '参与奖',
                'activity_id' => 20,
                'created_at' => '2020-04-29 23:56:38',
                'updated_at' => '2020-04-29 23:56:38',
                0 => NULL,
            ),
        ));
        
        
    }
}