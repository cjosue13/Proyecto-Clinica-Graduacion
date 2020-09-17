<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sistemadigestivos extends Model
{
  protected $primaryKey = 'sd_id';
  protected $fillable = ['sg_nombre'];
  protected $dates = ['created_at', 'updated_at'];
  
}
