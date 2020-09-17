<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_examenesclinicos extends Model
{
  protected $primaryKey = 'exm_id';
  protected $fillable = ['exm_peso', 'exm_altura', 'exm_imc', 'exm_FC', 'exm_Temperatura', 'exm_sistolica', 'exm_diastolica'];
  protected $dates = ['created_at', 'updated_at'];
  
}
