<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proveedors';

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
    protected $fillable = ['nom_pro', 'app_pro', 'dir', 'tlfn', 'cel_movi', 'cel_claro', 'fax', 'mail', 'web', 'ruc', 'representante', 'actividad', 'logo', 'id_pais', 'id_provincia', 'id_canton', 'status', 'empresa', 'ubicacion', 'latitud', 'longitud'];

    
}
