<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experiencias extends Model
{
    protected $primaryKey = 'exID';
    protected $fillable = ['exPuesto','exEmpresa','exCurriculum','exFechaInicio', 'fechaFinal', 'exDescripcion'];
    protected $dates = ['created_at', 'updated_at'];
}

