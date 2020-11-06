<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_antquirutrau extends Model
{
  protected $primaryKey = 'atqt_id';
  protected $fillable = ['atqt_fkExpediente', 'atqt_Nombre', 'atqt_descripcion', 'atqt_tipo', 'atqt_fecha'];
  protected $dates = ['created_at', 'updated_at'];
  
}
