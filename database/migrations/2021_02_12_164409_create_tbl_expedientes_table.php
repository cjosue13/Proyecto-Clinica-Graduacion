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
            $table->unsignedInteger('exp_paciente');
            $table->foreign('exp_paciente')->references('pac_id')->on('tbl_pacientes');
            $table->string('exp_Metas', 1000);
            $table->string('exp_Historiabiopatografica', 500);
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
