<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order_work';

	protected $fillable = [
	'num_secuencial', 
	'fecha_orden',
	'id_articulo',
	'id_marca',
	'id_estado',
	'id_cliente',
	'modelo',
	'serie',
	'problema_reportado',
	'notas',
	'responsable',
	'fecha_reparacion',
	'sello',
	'nomcli',
	'appcli',
	'tlfncli',
	'celcli',
	'mailcli',
	'anticipo',
	'valor',
	'cicli',
	'dircli',
	];

	public function articulo(){
		return $this->belongsTo('App\Articulo','id_articulo');
	}
	public function estado(){
		return $this->belongsTo('App\Estado','id_estado');
	}
	public function marca(){
		return $this->belongsTo('App\Marca','id_marca');
	}

}
