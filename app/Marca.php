<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marcas';

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
    protected $fillable = ['marca', 'descripcion', 'logo'];

    public function order()
    {
        return $this->hasMany('App\Order', 'id');
    }

    public function producto()
    {
        return $this->hasMany('App\Product', 'id');
    }
}
