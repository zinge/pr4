<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolemembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolemembers', function (Blueprint $table) {
            $table->increments('id');
        
            if (Schema::hasColumn('users', 'id')){
                $table->integer('users_id');
                $table->foreign('users_id')
                    ->references('id')
                    ->on('users');
            }

            if (Schema::hasColumn('roles', 'id')){
                $table->integer('roles_id');
                $table->foreign('roles_id')
                    ->references('id')
                    ->on('roles');
            }
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolemembers');
    }
}
