<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Departamento::create( [
    		'id'=>1,
    		'departamento'=>'Administracion',
    		'status'=>1
    		] );



    	Departamento::create( [
    		'id'=>2,
    		'departamento'=>'Caja',
    		'status'=>1
    		] );



    	Departamento::create( [
    		'id'=>3,
    		'departamento'=>'Bodega',
    		'status'=>1
    		] );



    	Departamento::create( [
    		'id'=>4,
    		'departamento'=>'Despachos',
    		'status'=>1
    		] );



    	Departamento::create( [
    		'id'=>5,
    		'departamento'=>'Taller',
    		'status'=>1
    		] );
    }
}
