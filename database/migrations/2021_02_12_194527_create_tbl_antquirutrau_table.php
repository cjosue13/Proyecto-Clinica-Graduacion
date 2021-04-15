<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAntquirutrauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_antquirutrau', function (Blueprint $table) {
            $table->increments('atqt_id');
			$table->unsignedInteger('atqt_fkExpediente');
            $table->foreign('atqt_fkExpediente')->references('exp_id')->on('tbl_expedientes')->onDelete('cascade');
			$table->string('atqt_Nombre', 50);
			$table->string('atqt_descripcion', 100);
			$table->string('atqt_tipo', 1);
			$table->date('atqt_fecha');
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
        Schema::dropIfExists('tbl_antquirutrau');
    }
}
