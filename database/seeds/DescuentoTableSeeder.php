<?php

use Illuminate\Database\Seeder;
use App\Descuento;

class DescuentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Descuento::create( [
    		'id'=>1,
    		'valor'=>10.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>2,
    		'valor'=>12.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>3,
    		'valor'=>15.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>4,
    		'valor'=>20.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>5,
    		'valor'=>25.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>6,
    		'valor'=>30.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>7,
    		'valor'=>35.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>8,
    		'valor'=>40.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>9,
    		'valor'=>45.00,
    		'status'=>1
    		] );

    	Descuento::create( [
    		'id'=>10,
    		'valor'=>50.00,
    		'status'=>1
    		] );
    }
}
