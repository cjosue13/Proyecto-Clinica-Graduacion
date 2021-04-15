<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sintomas', function (Blueprint $table) {
            $table->increments('sf_id');
			$table->unsignedInteger('sf_fkConsulta');
            $table->foreign('sf_fkConsulta')->references('c_id')->on('tbl_consultas')->onDelete('cascade');
			$table->string('sf_nombre',50);
			$table->string('sf_tipo',1);
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
        Schema::dropIfExists('tbl_sintomas');
    }
}
