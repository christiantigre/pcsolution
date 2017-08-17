<?php

use Illuminate\Database\Seeder;
use App\Iva;

class IvaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Iva::create( [
    		'id'=>1,
    		'valor'=>12.00,
    		'status'=>1
    		] );

    	Iva::create( [
    		'id'=>2,
    		'valor'=>14.00,
    		'status'=>1
    		] );
    }
}
