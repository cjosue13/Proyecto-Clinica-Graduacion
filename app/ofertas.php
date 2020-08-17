<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ofertas extends Model
{
    protected $primaryKey = 'ofID';
    protected $fillable = ['ofNombre','ofCategoria','ofDescripcion','ofFechaInicio','ofUbicacion' ,'ofFechaFinal', 'ofHorario','ofVacantes' ,'ofSueldo' ,'ofEmpresa'];
    protected $dates = ['created_at', 'updated_at'];
    
}

