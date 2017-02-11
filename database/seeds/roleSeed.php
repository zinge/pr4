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
         DB::table('roles')->insert([
            'roles_name' => 'root',
            'roles_desc' => 'Defaul SU role'
        ]);

        DB::table('rolemembers')->insert([
            'users_id' => '1',
            'roles_id' => '1'
        ]);

    }
}
