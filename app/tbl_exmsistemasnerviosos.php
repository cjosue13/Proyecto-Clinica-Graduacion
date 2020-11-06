<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_exmsistemasnerviosos extends Model
{
  protected $primaryKey = 'exSn_id';
  protected $fillable = ['exSn_examenClinico','exSn_fkSistemaNerviosoC','exSn_detalle'];
  protected $dates = ['created_at', 'updated_at'];
}
