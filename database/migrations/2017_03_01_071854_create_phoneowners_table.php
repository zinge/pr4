<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneownersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phoneowners', function (Blueprint $table) {
            $table->increments('id');

            if (Schema::hasColumn('phones', 'id')) {
                $table->integer('phone_id');
                $table->foreign('phone_id')
                  ->references('id')
                  ->on('phones');
            }

            if (Schema::hasColumn('coworkers', 'id')) {
                $table->integer('coworker_id');
                $table->foreign('coworker_id')
                  ->references('id')
                  ->on('coworkers');
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
        Schema::dropIfExists('phoneowners');
    }
}
