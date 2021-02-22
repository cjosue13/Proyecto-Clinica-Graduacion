<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_expedientes_antecedentes extends Model
{
  protected $primaryKey = 'ea_id';
  protected $fillable = ['ea_expediente','ea_enfermedad','ea_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
