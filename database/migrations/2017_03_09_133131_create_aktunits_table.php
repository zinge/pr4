<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktunits', function (Blueprint $table) {
            $table->increments('id');
            if (Schema::hasColumn('akts', 'id')) {
                $table->integer('akt_id');
                $table->foreign('akt_id')
                  ->references('id')
                  ->on('akts');
            }

            if (Schema::hasColumn('costs', 'id')) {
                $table->integer('cost_id');
                $table->foreign('cost_id')
                  ->references('id')
                  ->on('costs');
            }
            //физобъем
            $table->integer('aktunit_amount')->nullable();
            //итого в акте
            $table->decimal('aktunit_total_price', 10, 2);

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
        Schema::dropIfExists('aktunits');
    }
}
