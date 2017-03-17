<?php

use Illuminate\Database\Seeder;

class TelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Tele::class, 50)->create();
    }
}
