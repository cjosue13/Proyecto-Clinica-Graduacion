<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_examenes', function (Blueprint $table) {
            $table->increments('exmm_id');
			$table->unsignedInteger('exmm_fkConsulta');
            $table->foreign('exmm_fkConsulta')->references('c_id')->on('tbl_consultas');
			$table->string('exmm_Nombre',50);
			$table->string('exmm_Descripcion',1000);
            $table->string('exmm_Imagen',2048);
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
        Schema::dropIfExists('tbl_examenes');
    }
}
