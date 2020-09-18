<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_expedientes_antecedecentes extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = ['ea_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
