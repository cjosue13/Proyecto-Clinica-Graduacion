<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_problemacentralcitas extends Model
{
  protected $primaryKey = 'pcC_id';
  protected $fillable = ['pcC_Estado'];
  protected $dates = ['created_at', 'updated_at'];
}
