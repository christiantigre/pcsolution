<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_item extends Model
{
	protected $table = 'venta_items';

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

    protected $fillable = ['producto', 'codbarra','precio','cant','total','id_venta','id_producto'];
    
}
