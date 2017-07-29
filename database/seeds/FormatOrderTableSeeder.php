<?php

use Illuminate\Database\Seeder;
use App\Formatorden;

class FormatOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	Formatorden::create( [
    		'id'=>1,
    		'clausula'=>'La garantía no sera valida si el equipo a sido manipulado en otro local.',
    		'status'=>1
    		] );



    	Formatorden::create( [
    		'id'=>2,
    		'clausula'=>'La información del equipo sera única responsabilidad del dueño por lo que se recomienda respaldar la misma antes de realizar el ingreso o solicitar el respaldo de la información.',
    		'status'=>1
    		] );



    	Formatorden::create( [
    		'id'=>3,
    		'clausula'=>'Si el equipo no a sido retirado en un plazo transcurrido en de 30 días se cobrara un valor de $5.00 por un costo de almacenamiento con un plazo máximo de 2 meses, luego de este tiempo se consideraran abandonados cediendo el equipo en compensacion por costo de reparación y bodegaje sin reclamo a indemnización alguna.',
    		'status'=>1
    		] );




    }
}
