<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_heredofamiliares_expedientes extends Model
{
  protected $primaryKey = 'he_id';
  protected $fillable = ['he_Parentesco', 'he_Descripcion','he_enfermedad_fk','exp_fk'];
  protected $dates = ['created_at', 'updated_at'];
}
