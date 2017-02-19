<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoworkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coworkers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('secname', 30);
            $table->string('thirdname', 30);

            if (Schema::hasColumn('addresses', 'id')) {
              $table->integer('address_id');
              $table->foreign('address_id')
              ->references('id')
              ->on('addresses');
            }

            if (Schema::hasColumn('mvzs', 'id')) {
                $table->integer('mvz_id');
                $table->foreign('mvz_id')
                ->references('id')
                ->on('mvzs');
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
        Schema::dropIfExists('coworkers');
    }
}
