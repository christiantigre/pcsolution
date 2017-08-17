<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Genero::create( [
    		'id'=>1,
    		'genero'=>'Masculino'
    		] );



    	Genero::create( [
    		'id'=>2,
    		'genero'=>'Femenino'
    		] );
    }
}
