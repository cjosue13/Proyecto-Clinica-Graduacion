<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_antecedentesginecologicos extends Model
{
    protected $primaryKey = 'ag_id';
    protected $fillable = ['ag_Menarca','ag_Edad', 'ag_CiclosMenstruales', 'ag_Embarazos', 'ag_Partos', 'ag_Abortos', 'ag_Cesareas', 'ag_FUR', 'ag_FUPAP', 'ag_PF', 'ag_PF_detalle', 'ag_PRS', 'ag_NoCS'];
    protected $dates = ['created_at', 'updated_at'];

}

