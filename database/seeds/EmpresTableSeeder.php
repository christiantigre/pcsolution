<?php

use Illuminate\Database\Seeder;
use App\Empres;

class EmpresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Empres::create( [
    		'id'=>1,
    		'nom_local'=>'PCSOLUTION',
    		'nom_prop'=>'CHRISTIAN',
    		'app_prop'=>'TIGRE',
    		'ci_prop'=>'0105118509',
    		'ruc_prop'=>'0105118509001',
    		'tlfn'=>'2203584',
    		'cel_movi'=>'0992702599',
    		'cel_claro'=>'0985288525',
    		'mail'=>'andres',
    		'dir'=>'Jaime Roldos y Manuel Moreno',
    		'area_especializacion'=>'Mantenimiento de hardware y software.',
    		'descripcion'=>NULL,
    		'fax'=>NULL,
    		'link_web'=>NULL,
    		'fb'=>NULL,
    		'tw'=>NULL,
    		'gog'=>NULL,
    		'likein'=>NULL,
    		'logo'=>NULL,
    		'iso_logotipo'=>NULL,
    		'slogan'=>NULL
    		] );
    }
}
