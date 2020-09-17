<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_examen_sistemasdigestivos extends Model
{
  protected $primaryKey = 'exSg_id';
  protected $fillable = ['exSg_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
