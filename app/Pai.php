<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pai extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pais';

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
    protected $fillable = ['pais', 'iso', 'status'];

    public function Proveedor()
    {
        return $this->hasMany('App\Proveedor', 'id');
    }
    
}
