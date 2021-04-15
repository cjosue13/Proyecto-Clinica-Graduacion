<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPersonalessocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_personalessociales', function (Blueprint $table) {
            $table->increments('ps_id');
			$table->string('ps_Etapa',30);
			$table->unsignedInteger('ps_fkExpediente');
            $table->foreign('ps_fkExpediente')->references('exp_id')->on('tbl_expedientes')->onDelete('cascade');
			$table->string('ps_descripcion',1000);
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
        Schema::dropIfExists('tbl_personalessociales');
    }
}
