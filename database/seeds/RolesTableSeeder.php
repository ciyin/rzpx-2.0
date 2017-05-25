<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            0=>array(
                'role'=>'督导(兼)',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            1=>array(
                'role'=>'督导',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            2=>array(
                'role'=>'CR',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            3=>array(
                'role'=>'顾问',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            4=>array(
                'role'=>'行政',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            5=>array(
                'role'=>'副校长',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            6=>array(
                'role'=>'教务',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            7=>array(
                'role'=>'教师',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            8=>array(
                'role'=>'财务',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            9=>array(
                'role'=>'人力',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
            10=>array(
                'role'=>'管理员',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
        ));
    }
}
