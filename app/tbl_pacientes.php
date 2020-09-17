<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_pacientes extends Model
{
  protected $primaryKey = 'pac_id';
  protected $fillable = ['pac_pNombre', 'pac_sNombre', 'pac_pApellido', 'pac_sApellido', 'pac_Cedula', 'pac_Genero', 'pac_FechaNacimiento', 'pac_Residencia', 'pac_Correo', 'pac_Profesion_Oficio', 'pac_EstadoCivil', 'pac_Religion'];
  protected $dates = ['created_at', 'updated_at'];
}
