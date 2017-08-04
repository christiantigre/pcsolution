<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuestos extends Model
{
	protected $table = 'repuestos';

	protected $fillable = [
	'valor',
	'repuesto',
	'id_orden',
	'is_pagado'
	];
}
