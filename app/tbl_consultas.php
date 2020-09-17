<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_consultas extends Model
{
  protected $primaryKey = 'c_id';
  protected $fillable = ['c_motivo', 'c_HistoriaPadecimientoAct', 'c_sintomaPsiquico', 'c_Diagnostico', 'c_Problemas', 'c_indicaciones', 'c_recomendaciones', 'c_Hora', 'c_Fecha', 'c_Acompanante'];
  protected $dates = ['created_at', 'updated_at'];
  
}
