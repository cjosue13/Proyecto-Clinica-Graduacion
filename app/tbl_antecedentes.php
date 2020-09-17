<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_antecedentes extends Model
{
  protected $primaryKey = 'ap_id';
  protected $fillable = ['at_Nombre', 'at_tipo', 'at_fecha'];
  protected $dates = ['created_at', 'updated_at'];

}
