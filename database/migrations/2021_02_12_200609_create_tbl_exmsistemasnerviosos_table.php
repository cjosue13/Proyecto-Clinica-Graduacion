<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExmsistemasnerviososTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exmsistemasnerviosos', function (Blueprint $table) {
            $table->increments('exSn_id');
			$table->unsignedInteger('exSn_examenClinico');
            $table->foreign('exSn_examenClinico')->references('exm_id')->on('tbl_examenesclinicos')->onDelete('cascade');
			$table->unsignedInteger('exSn_fkSistemaNerviosoC');
            $table->foreign('exSn_fkSistemaNerviosoC')->references('snc_id')->on('tbl_sistemanerviosos')->onDelete('cascade');
			$table->string('exSn_detalle',1000);
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
        Schema::dropIfExists('tbl_exmsistemasnerviosos');
    }
}
