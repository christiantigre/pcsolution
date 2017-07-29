<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Estado::create( [
    		'id'=>1,
    		'estado'=>'RECIBIDO',
    		'descripcion'=>'se recepta el equipo para reparación',
    		'created_at'=>'2017-07-21 19:50:24',
    		'updated_at'=>'2017-07-21 19:50:24'
    		] );



    	Estado::create( [
    		'id'=>2,
    		'estado'=>'RECHAZADO',
    		'descripcion'=>'Se rechaza el equipo por fallo de reparación.',
    		'created_at'=>'2017-07-21 19:52:07',
    		'updated_at'=>'2017-07-21 19:52:19'
    		] );



    	Estado::create( [
    		'id'=>3,
    		'estado'=>'FINALIZADO',
    		'descripcion'=>'Se finalizo la reparación del equipo.',
    		'created_at'=>'2017-07-21 19:52:50',
    		'updated_at'=>'2017-07-21 19:52:50'
    		] );



    	Estado::create( [
    		'id'=>4,
    		'estado'=>'ENTREGADO',
    		'descripcion'=>'Se realizo la entrega del equipo.',
    		'created_at'=>'2017-07-21 19:53:11',
    		'updated_at'=>'2017-07-21 19:53:11'
    		] );



    	Estado::create( [
    		'id'=>5,
    		'estado'=>'ENVIADO',
    		'descripcion'=>'Se envio el equipo al dueño.',
    		'created_at'=>'2017-07-21 19:53:33',
    		'updated_at'=>'2017-07-21 19:53:33'
    		] );

    }
}
