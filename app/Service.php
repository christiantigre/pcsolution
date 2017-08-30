<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

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
    protected $fillable = [
    'nombre', 'codservice', 'codbarra',
    'cant', 'pre_com', 
    'pre_ven', 'img', 
    'prgr_tittle','text',
    'nuevo', 'promocion', 
    'catalogo', 'is_active','descripcion'
    ];

    
}
