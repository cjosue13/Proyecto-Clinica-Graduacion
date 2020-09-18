<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_examenes_sistemasnerviosos extends Model
{
  protected $primaryKey = 'exSn_id';
  protected $fillable = ['exSn_detalle'];
  protected $dates = ['created_at', 'updated_at'];
}
