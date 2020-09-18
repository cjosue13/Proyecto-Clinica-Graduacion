<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_heredofamiliares_expedientes extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = ['he_Parentesco', 'he_Descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
