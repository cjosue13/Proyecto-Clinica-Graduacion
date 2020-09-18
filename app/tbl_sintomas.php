<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sintomas extends Model
{
  protected $primaryKey = 'pac_id';
  protected $fillable = ['sf_nombre', 'sf_tipo'];
  protected $dates = ['created_at', 'updated_at'];
}
