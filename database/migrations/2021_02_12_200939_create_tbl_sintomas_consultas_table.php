<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSintomasConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sintomas_consultas', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('sf_fk');
            $table->foreign('sf_fk')->references('sf_id')->on('tbl_sintomas');
			$table->unsignedInteger('c_fk');
            $table->foreign('c_fk')->references('c_id')->on('tbl_consultas');
			$table->string('sc_Descripcion',1000);
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
        Schema::dropIfExists('tbl_sintomas_consultas');
    }
}
