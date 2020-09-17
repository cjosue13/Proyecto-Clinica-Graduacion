<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_etapas extends Model
{
  protected $primaryKey = 'et_id';
  protected $fillable = ['et_nombre'];
  protected $dates = ['created_at', 'updated_at'];
  
}
