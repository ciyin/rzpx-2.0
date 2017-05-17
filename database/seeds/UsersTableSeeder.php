<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0=>array(
                'name'=>'刘丹霞',
                'username'=>'liudanxia',
                'password'=>bcrypt('liuCIyin826'),
                'city'=>'上海',
                'status'=>'使用中',
                'created_by'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ),
        ));
    }
}
