<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

	protected $fillable = [
	'nom_cli', 
	'app_cli',
	'ci_cli',
	'ruc_cli',
	'fecha_nac',
	'tlfn',
	'cel',
	'mail',
	'dir',
	'id_cliente',
	'status',
	];
}
