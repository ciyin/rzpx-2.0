<?php

use Illuminate\Database\Seeder;

class VideoTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video_types')->insert(array(
            0=>array(
                'type'=>'留学酷',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            1=>array(
                'type'=>'CRM',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            2=>array(
                'type'=>'1 Course',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
        ));
    }
}
