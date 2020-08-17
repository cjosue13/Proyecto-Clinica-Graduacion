<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class requisitos extends Model
{
  protected $primaryKey = 'rqID';
    protected $fillable = ['rqNombre','rqDescripcion', 'rqOfertaTrabajo'];
    protected $dates = ['created_at', 'updated_at'];

}

