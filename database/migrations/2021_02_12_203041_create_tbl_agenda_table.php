<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_agendas', function (Blueprint $table) {
            $table->increments('agn_id');
            $table->string('agn_NombreCompleto', 100);
            $table->string('agn_telefono', 30);
            $table->date('agn_fecha');
            $table->string('agn_HoraInicio', 10);
            $table->string('agn_HoraFinal', 10);
            $table->double('agn_Tiempo', 10, 0);
            $table->string('agn_descripcion', 500);
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
        Schema::dropIfExists('tbl_agenda');
    }
}
