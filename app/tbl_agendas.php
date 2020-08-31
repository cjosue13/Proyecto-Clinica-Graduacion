<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_agendas extends Model
{
  protected $primaryKey = 'agn_id';
    protected $fillable = ['agn_NombreCompleto','agn_telefono','agn_fecha','agn_HoraInicio', 'agn_HoraFinal', 'agn_estado','agn_Tiempo','agn_descripcion'];
    protected $dates = ['created_at', 'updated_at'];

}

