<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_examenes extends Model
{
  protected $primaryKey = 'exmm_id';
  protected $fillable = ['exmm_fkConsulta','exmm_Nombre', 'exmm_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
  
}
