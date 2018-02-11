<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
 	public $table = 'Endereco';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 			'id_Empresa_fk',
    		'id_CEP_fk',
    		'complemento',
    		'Endereco',
    		'Numero',
    		'id_Lougradouro_fk' 
 	];

}
