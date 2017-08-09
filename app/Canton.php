<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cantons';

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
    protected $fillable = ['canton', 'iso', 'status', 'provincia_id'];

    public function provincium()
	{
		return $this->belongsTo('App\Provincium');
	}
	
}
