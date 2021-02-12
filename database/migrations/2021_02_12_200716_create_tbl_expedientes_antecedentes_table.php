<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExpedientesAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_expedientes_antecedentes', function (Blueprint $table) {
            $table->increments('ea_id');
			$table->unsignedInteger('ea_expediente');
            $table->foreign('ea_expediente')->references('exp_id')->on('tbl_expedientes');
            $table->unsignedInteger('ea_enfermedad');
            $table->foreign('ea_enfermedad')->references('atpnp_id')->on('tbl_antenfermedades');
			$table->string('ea_Descripcion',1000);
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
        Schema::dropIfExists('tbl_expedientes_antecedentes');
    }
}
