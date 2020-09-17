<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sistemanerviosos extends Model
{
  protected $primaryKey = 'snc_id';
    protected $fillable = ['snc_nombre'];
    protected $dates = ['created_at', 'updated_at'];

}

