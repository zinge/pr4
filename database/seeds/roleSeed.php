<?php

use Illuminate\Database\Seeder;

class roleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => '1',
            'name' => 'zinge',
            'email' => 'zinge@localhost',
            'password' => bcrypt('P@ssw0rd')
        ]);

        DB::table('roles')->insert([
            'id' => '1',
            'role_name' => 'root',
            'role_desc' => 'Defaul SU role'
        ]);

        DB::table('rolemembers')->insert([
            'user_id' => '1',
            'role_id' => '1'
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'role_name' => 'mvz_rw',
            'role_desc' => 'MVZs RW rights'
        ]);

        DB::table('rolemembers')->insert([
            'user_id' => '1',
            'role_id' => '2'
        ]);


    }
}
