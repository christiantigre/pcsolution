<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Client::create( ['id'=>1,'nom_cli'=>'CLIENTE','app_cli'=>'FINAL','ci_cli'=>'9999999999','ruc_cli'=>'9999999999999','fecha_nac'=>NULL,
    		'tlfn'=>'','cel'=>'','mail'=>'',	'dir'=>''] );
    }
}
