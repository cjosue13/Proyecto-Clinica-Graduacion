<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class antHereFam extends Model
{
    protected $primaryKey = 'hf_id';
    protected $fillable = ['hf_nombre'];
    protected $dates = ['created_at', 'updated_at'];
}
