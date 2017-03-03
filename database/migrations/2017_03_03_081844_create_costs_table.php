<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');

            if (Schema::hasColumn('agreements', 'id')) {
              $table->integer('agreement_id');
              $table->foreign('agreement_id')
              ->references('id')
              ->on('agreements');
            }

            if (Schema::hasColumn('services', 'id')) {
              $table->integer('service_id');
              $table->foreign('service_id')
              ->references('id')
              ->on('services');
            }

            if (Schema::hasColumn('mvzs', 'id')) {
              $table->integer('mvz_id');
              $table->foreign('mvz_id')
              ->references('id')
              ->on('mvzs');
            }

            //количество, физ. объем
            $table->integer('amount');
            //стоимость, расценки
            $table->decimal('worth', 10, 2);
            //итого в договор
            $table->decimal('total_price', 10, 2);
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
        Schema::dropIfExists('costs');
    }
}
