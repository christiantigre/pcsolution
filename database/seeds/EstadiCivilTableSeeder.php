<?php

use Illuminate\Database\Seeder;
use App\EstadoCivil as Estadocivil;
class EstadiCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Estadocivil::create( [
    		'id'=>1,
    		'estado_civil'=>'Soltero(a)'
    		] );

    	Estadocivil::create( [
    		'id'=>2,
    		'estado_civil'=>'Unión de hecho'
    		] );

    	Estadocivil::create( [
    		'id'=>3,
    		'estado_civil'=>'Casado(a)'
    		] );

    	Estadocivil::create( [
    		'id'=>4,
    		'estado_civil'=>'Divorciado(a)'
    		] );

    	Estadocivil::create( [
    		'id'=>5,
    		'estado_civil'=>'Viudo(a)'
    		] );
    }
}
