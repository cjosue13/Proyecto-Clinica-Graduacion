<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExamenesclinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_examenesclinicos', function (Blueprint $table) {
            $table->increments('exm_id');
			$table->unsignedInteger('exm_consulta');
            $table->foreign('exm_consulta')->references('c_id')->on('tbl_consultas');
			$table->float('exm_peso',3,3);
			$table->float('exm_imc',3,6);
			$table->float('exm_FC',3,3);
			$table->float('exm_Temperatura',3,3);
			$table->float('exm_sistolica',3,3);
			$table->float('exm_diastolica',3,3);
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
        Schema::dropIfExists('tbl_examenesclinicos');
    }
}
