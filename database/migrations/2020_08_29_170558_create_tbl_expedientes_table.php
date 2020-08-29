<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_expedientes', function (Blueprint $table) {
            $table->increments('exp_id');
            $table->unsignedInteger('exp_fkAntGin');
            $table->foreign('exp_fkAntGin')->references('ag_id')->on('tbl_antecedentesginecologicos');
            $table->string('exp_Metas', 1000);
            $table->string('exp_Historiabiopatografica', 1000);
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
        Schema::dropIfExists('tbl_expedientes');
    }
}
