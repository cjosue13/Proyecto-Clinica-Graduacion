<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_consultas', function (Blueprint $table) {
            $table->increments('c_id');
			$table->unsignedInteger('c_fkExpediente');
            $table->foreign('c_fkExpediente')->references('exp_id')->on('tbl_expedientes');
			$table->string('c_tipo',1);
			$table->string('c_motivo',1000);
			$table->string('c_HistoriaPadecimientoAct',1000);
			$table->string('c_sintomaPsiquico',1000);
			$table->string('c_Diagnostico',1000);
			$table->string('c_Problemas',1000);
			$table->string('c_indicaciones',1000);
			$table->string('c_recomendaciones',1000);
			$table->string('c_Hora',50);
			$table->date('c_Fecha');
			$table->string('c_Acompanante',100);
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
        Schema::dropIfExists('tbl_consultas');
    }
}
