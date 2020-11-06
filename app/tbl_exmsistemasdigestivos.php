<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_exmsistemasdigestivos extends Model
{
  protected $primaryKey = 'exSg_id';
  protected $fillable = ['exSg_examenClinico','exSg_fkSistemaDigestivo','exSg_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
