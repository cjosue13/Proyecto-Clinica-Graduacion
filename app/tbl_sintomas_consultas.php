<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sintomas_consultas extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = ['sf_fk','c_fk','sc_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
