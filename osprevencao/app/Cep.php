<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
 	public $table = 'cep';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 			'cep',
    		'id_Cidade_fk',
    		'id_Estado_fk'
 	];

}
