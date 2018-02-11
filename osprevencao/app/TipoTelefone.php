<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTelefone extends Model
{
 	public $table = 'tipoTelefone';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 		'TipoTelefone'
 	];

}
