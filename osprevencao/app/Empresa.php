<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
 	public $table = 'empresa';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 		'NomeEmpresa',
 		'cnpj',
 		'id_Tipo_Cadastro_fk'
 	];

}
