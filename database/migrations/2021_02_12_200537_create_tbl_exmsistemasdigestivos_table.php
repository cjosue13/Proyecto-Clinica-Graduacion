<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExmsistemasdigestivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exmsistemasdigestivos', function (Blueprint $table) {
            $table->increments('exSg_id');
			$table->unsignedInteger('exSg_examenClinco');
            $table->foreign('exSg_examenClinco')->references('exm_id')->on('tbl_examenesclinicos')->onDelete('cascade');
			$table->unsignedInteger('exSg_fkSistemaDigestivo');
            $table->foreign('exSg_fkSistemaDigestivo')->references('sd_id')->on('tbl_sistemadigestivos')->onDelete('cascade');
			$table->string('exSg_Descripcion',1000);
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
        Schema::dropIfExists('tbl_exmsistemasdigestivos');
    }
}
