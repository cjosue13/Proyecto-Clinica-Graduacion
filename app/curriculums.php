<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curriculums extends Model
{
    protected $primaryKey = 'crID';
    protected $fillable = ['crUsuario','crObservaciones'];
    protected $dates = ['created_at', 'updated_at'];
}
