<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provincias';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['provincia', 'iso', 'status', 'pais_id'];

    public function pais()
	{
		return $this->belongsTo('App\Pai');
	}

    public function Proveedor()
    {
        return $this->hasMany('App\Proveedor', 'id');
    }
	
}
