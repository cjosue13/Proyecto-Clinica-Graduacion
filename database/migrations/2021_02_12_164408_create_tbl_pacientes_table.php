<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pacientes', function (Blueprint $table) {
            $table->increments('pac_id');
			$table->string('pac_pNombre',50);
			$table->string('pac_sNombre',50)->nullable();
			$table->string('pac_pApellido',50);
			$table->string('pac_sApellido',50);
			$table->string('pac_Cedula',50)->unique();
			$table->string('pac_Genero',1);
			$table->date('pac_FechaNacimiento',50);
			$table->string('pac_Residencia',400);
			$table->string('pac_Correo',50)->nullable();
			$table->string('pac_Profesion_Oficio',50);
			$table->string('pac_EstadoCivil',2);
			$table->string('pac_Religion',50);
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
        Schema::dropIfExists('tbl_pacientes');
    }
}
