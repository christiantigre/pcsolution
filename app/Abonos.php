<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonos extends Model
{
	protected $table = 'abonos';

	protected $fillable = [
	'abono',
	'articulo',
	'id_orden',
	'fecha',
	'emitente',
	];

}
