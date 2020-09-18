<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_problemacentraltipos extends Model
{
  protected $primaryKey = 'pc_id';
  protected $fillable = ['pc_nombre'];
  protected $dates = ['created_at', 'updated_at'];
}
