<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_apariencias extends Model
{
  protected $primaryKey = 'apa_id';
  protected $fillable = ['apa_Piel', 'apa_Extremidades', 'apa_SignosRespiratorios', 'apa_Nasofaringeo'];
  protected $dates = ['created_at', 'updated_at'];
  
}
