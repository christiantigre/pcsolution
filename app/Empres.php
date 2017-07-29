<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empres extends Model
{
	protected $table = 'empres';

	protected $fillable = [
	'nom_local', 
	'nom_prop',
	'app_prop',
	'ci_prop',
	'ruc_prop',
	'tlfn',
	'cel_movi',
	'cel_claro',
	'mail',
	'dir',
	'area_especializacion',
	'descripcion',
	'fax',
	'link_web',
	'fb',
	'tw',
	'gog',
	'likein',
	'logo',
	'iso_logotipo',
	'slogan',
	];
}
