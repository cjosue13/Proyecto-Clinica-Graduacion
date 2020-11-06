<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_personalessociales extends Model
{
  protected $primaryKey = 'ps_id';
  protected $fillable = ['ps_fkEtapa','ps_fkExpediente','ps_descripcion'];
  protected $dates = ['created_at', 'updated_at'];
}
