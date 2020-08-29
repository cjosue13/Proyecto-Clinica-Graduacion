<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_expedientes extends Model
{
    protected $primaryKey = 'exp_id';
    protected $fillable = ['exp_Metas','exp_Historiabiopatografica'];
    protected $dates = ['created_at', 'updated_at'];
    
}

