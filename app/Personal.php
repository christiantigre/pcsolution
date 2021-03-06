<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personals';

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
    'nom_per', 
    'app_per', 
    'dir', 
    'tlfn', 
    'cel_movi', 
    'cel_claro', 
    'id_genero', 
    'id_estadocivil', 
    'hijos', 
    'fecha_nac', 
    'id_pais', 
    'id_provincia', 
    'id_canton', 
    'id_cargo', 
    'id_user',
    'foto', 
    'status', 
    'mail',
    'cedula',
    'pasaporte'
    ];

    public function cargo(){
        return $this->belongsTo('App\Cargo','id_cargo');
    }

    
}
