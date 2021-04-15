<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAparienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_apariencias', function (Blueprint $table) {
            $table->increments('apa_id');
			$table->unsignedInteger('apa_examenClinico');
            $table->foreign('apa_examenClinico')->references('exm_id')->on('tbl_examenesclinicos')->onDelete('cascade');
			$table->string('apa_Piel', 1000);
			$table->string('apa_Extremidades', 1000);
			$table->string('apa_SignosRespiratorios', 1000);
			$table->string('apa_Nasofaringeo', 1000);
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
        Schema::dropIfExists('tbl_apariencias');
    }
}
