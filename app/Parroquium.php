<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parroquias';

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
    protected $fillable = ['parroquia', 'iso', 'status', 'canton_id'];

    public function canton()
	{
		return $this->belongsTo('App\Canton');
	}
	
}
