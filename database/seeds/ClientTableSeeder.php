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
    	Client::create( ['id'=>1,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
    		'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com',	'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>2,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>3,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>4,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>5,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>6,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>7,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>8,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>9,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>10,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
        Client::create( ['id'=>11,'nom_cli'=>'ANDRES','app_cli'=>'CONDO','ci_cli'=>'0909889898','ruc_cli'=>'0909098989098','fecha_nac'=>NULL,
            'tlfn'=>'234234','cel'=>'1231231233','mail'=>'andrescondo17@gmail.com', 'dir'=>'3 de Noviembre y Cesar Cueva'] );
    }
}
