<?php

use Illuminate\Database\Seeder;
use App\Tipopago;

class TipopagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Tipopago::create( [
    		'id'=>1,
    		'tipopago'=>'Efectivo',
    		'status'=>1
    		] );



    	Tipopago::create( [
    		'id'=>2,
    		'tipopago'=>'Cheque',
    		'status'=>1
    		] );



    	Tipopago::create( [
    		'id'=>3,
    		'tipopago'=>'Transferencia bancaria',
    		'status'=>1
    		] );



    	Tipopago::create( [
    		'id'=>4,
    		'tipopago'=>'Crédito',
    		'status'=>1
    		] );
    }
}
