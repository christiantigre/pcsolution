<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatOrden extends Model
{
    protected $table = 'format_ordens';

	protected $fillable = [
	'clausula', 
	'status',
	];
}
