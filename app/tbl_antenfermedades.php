<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_antenfermedades extends Model
{
  protected $primaryKey = 'atpnp_id';
  protected $fillable = ['atpnp_nombre', 'atpnp_tipo'];
  protected $dates = ['created_at', 'updated_at'];
  
}
