<?php

use Illuminate\Database\Seeder;
use App\Estadopago;

class EstadopagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Estadopago::create( [
    		'id'=>1,
    		'estadopago'=>'Pendiente',
    		'status'=>1
    		] );



    	Estadopago::create( [
    		'id'=>2,
    		'estadopago'=>'Pagado',
    		'status'=>1
    		] );


    }
}
