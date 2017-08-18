<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ventas';

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
    protected $fillable = ['secuencial', 'numerofactura', 'claveacceso', 'total', 'subtotal', 'valorconiva', 'valorsiniva', 'valorcondescuento', 'fecha_venta', 'status', 'responsable', 'cantidad_items', 'id_iva', 'id_descuento', 'id_cliente', 'id_vendedor'];

    
}
