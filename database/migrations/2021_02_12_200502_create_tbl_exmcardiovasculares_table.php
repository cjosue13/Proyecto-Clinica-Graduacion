<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExmcardiovascularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exmcardiovasculares', function (Blueprint $table) {
            $table->increments('car_id');
			$table->unsignedInteger('car_examenClinico');
            $table->foreign('car_examenClinico')->references('exm_id')->on('tbl_examenesclinicos')->onDelete('cascade');
			$table->string('car_detalle',1000);
			$table->string('car_tipo',10);
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
        Schema::dropIfExists('tbl_exmcardiovasculares');
    }
}
