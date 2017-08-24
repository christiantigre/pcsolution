<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';

	protected $fillable = [
	'idproducto', 
	'nomproducto',
	'codbarra',
	'cantidad',
	'total',
	];
}
