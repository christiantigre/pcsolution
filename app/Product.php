<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['nombre', 'slug', 'codbarra', 'cant', 'pre_com', 'pre_ven', 'img', 'prgr_tittle', 'nuevo', 'promocion', 'catalogo', 'is_active', 'articulo_id', 'marca_id','proveedor_id'];

    public function articulo(){
        return $this->belongsTo('App\Articulo','articulo_id');
    }
    
    public function marca(){
        return $this->belongsTo('App\Marca','marca_id');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'id');
    }
    
}
