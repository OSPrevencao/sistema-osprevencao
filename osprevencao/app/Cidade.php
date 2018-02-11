<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
 	public $table = 'cidade';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 			'cidade',
    		'id_Estado_fk' 
 	];

}
