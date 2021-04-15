<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAntecedentesginecologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_antecedentesginecologicos', function (Blueprint $table) {
            $table->increments('ag_id');
			$table->unsignedInteger('ag_expediente');
			$table->foreign('ag_expediente')->references('exp_id')->on('tbl_expedientes')->onDelete('cascade');
            $table->date('ag_Menarca');
            $table->double('ag_Edad', 3, 0);
            $table->double('ag_CiclosMenstruales', 3, 0);
            $table->double('ag_Embarazos', 3, 0);
            $table->double('ag_Partos', 3, 0);
            $table->double('ag_Abortos', 3, 0);
            $table->double('ag_Cesareas', 3, 0);
            $table->date('ag_FUR');
            $table->double('ag_FUPAP', 3, 0);
            $table->string('ag_PF', 1);
            $table->string('ag_PF_detalle', 1000);
            $table->date('ag_PRS');
            $table->double('ag_NoCS', 3, 0);
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
        Schema::dropIfExists('tbl_antecedentesginecologicos');
    }
}
