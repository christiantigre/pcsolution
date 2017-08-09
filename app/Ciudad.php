<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ciudads';

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
    protected $fillable = ['ciudad', 'iso', 'status', 'provincia_id'];

    public function provincium()
	{
		return $this->belongsTo('App\Provincium');
	}
	
}
