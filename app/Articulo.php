<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
	protected $table = 'articulos';

	protected $fillable = [
	'id', 
	'articulo', 
	'cod_articulo',
	'status',
	];

	public function order()
	{
		return $this->hasMany('App\Order', 'id');
	}
}
