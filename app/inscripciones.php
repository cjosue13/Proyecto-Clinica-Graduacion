<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscripciones extends Model
{
  protected $primaryKey = 'id_inscripciones';
  protected $fillable = ['id_user', 'id_oferta'];
  protected $dates = ['created_at', 'updated_at'];
}
