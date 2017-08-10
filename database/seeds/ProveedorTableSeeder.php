<?php

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Proveedor::create( [
    		'id'=>1,
    		'nom_pro'=>'n/n',
    		'app_pro'=>'n/n',
    		'dir'=>'n/n',
    		'tlfn'=>'0',
    		'cel_movi'=>'0',
    		'cel_claro'=>'0',
    		'fax'=>'0',
    		'mail'=>'mail@gmail.com',
    		'web'=>'n/n',
    		'ruc'=>'1',
    		'representante'=>'n/n',
    		'actividad'=>'n/n',
    		'logo'=>'n/n',
    		'id_pais'=>66,
    		'id_provincia'=>1,
    		'id_canton'=>1,
    		'status'=>1,
    		'empresa'=>'n/n',
    		'ubicacion'=>'n/n',
    		'latitud'=>'n/n',
    		'longitud'=>'n/n',
    		'created_at'=>'2017-08-10 22:36:04',
    		'updated_at'=>'2017-08-10 22:36:04'
    		] );
    }
}
