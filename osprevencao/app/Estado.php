<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
 	public $table = 'estado';
 	public $timestamps = false;//coluna de ultima atualização

 	public $fillable = [
 		'estado'
 	];

}
