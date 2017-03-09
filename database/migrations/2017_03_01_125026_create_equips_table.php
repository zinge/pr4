<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invnumber', 20);
            $table->string('equipname', 128);
            $table->string('equipvendor', 20);
            $table->boolean('owned')->default('true');

            if (Schema::hasColumn('coworkers', 'id')) {
                $table->integer('coworker_id');
                $table->foreign('coworker_id')
                ->references('id')
                ->on('coworkers');
            }

            if (Schema::hasColumn('equiptypes', 'id')) {
                $table->integer('equiptype_id');
                $table->foreign('equiptype_id')
                ->references('id')
                ->on('equiptypes');
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
        Schema::dropIfExists('equips');
    }
}
