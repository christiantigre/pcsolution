<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Cargo::create( [
    		'id'=>1,
    		'cargo'=>'Cajera',
    		'status'=>1,
    		'departamento_id'=>2
    		] );


    	
    	Cargo::create( [
    		'id'=>2,
    		'cargo'=>'Gerente',
    		'status'=>1,
    		'departamento_id'=>1
    		] );


    	
    	Cargo::create( [
    		'id'=>3,
    		'cargo'=>'Despachador',
    		'status'=>1,
    		'departamento_id'=>3
    		] );


    	
    	Cargo::create( [
    		'id'=>4,
    		'cargo'=>'Técnico',
    		'status'=>1,
    		'departamento_id'=>5
    		] );
    }
}
