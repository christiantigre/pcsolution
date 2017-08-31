<?php

use Illuminate\Database\Seeder;
use App\Personal;

class PersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Personal::create( [
    		'id'=>1,
    		'nom_per'=>'Andres',
    		'app_per'=>'Condo',
    		'dir'=>'Jaime roldos y Cesar cueva',
    		'tlfn'=>'2203584',
    		'cedula'=>'0105118509',
    		'pasaporte'=>'0105118509',
    		'cel_movi'=>'0992702599',
    		'cel_claro'=>'9876875876',
    		'hijos'=>NULL,
    		'fecha_nac'=>'2017-09-12',
    		'id_pais'=>66,
    		'id_provincia'=>1,
    		'id_canton'=>1,
    		'id_cargo'=>4,
    		'id_genero'=>1,
    		'id_estadocivil'=>1,
    		'id_user'=>2,
    		'foto'=>NULL,
    		'status'=>1,
    		'mail'=>'andrescondo17@gmail.com'
    		] );
    }
}
