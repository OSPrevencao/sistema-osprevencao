<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
 	public $table = 'telefone';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 			'ddd',
    		'telefone',
    		'id_Empresa_fk',
    		'id_Tipo_telefone_fk'
 	];

}
