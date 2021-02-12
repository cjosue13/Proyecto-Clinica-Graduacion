<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHeredofamiliaresExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_heredofamiliares_expedientes', function (Blueprint $table) {
            $table->increments('he_id');
			$table->string('he_Parentesco',50);
			$table->string('he_Descripcion',50);
			$table->unsignedInteger('he_enfermedad_fk');
            $table->foreign('he_enfermedad_fk')->references('atpnp_id')->on('tbl_antenfermedades');
			$table->unsignedInteger('exp_fk');
            $table->foreign('exp_fk')->references('exp_id')->on('tbl_expedientes');
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
        Schema::dropIfExists('tbl_heredofamiliares_expedientes');
    }
}
