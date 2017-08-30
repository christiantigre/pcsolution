<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Service::create( [
    		'id'=>1,
    		'nombre'=>'Formateo',
    		'codbarra'=>'0000001',
    		'cant'=>'1',
    		'pre_com'=>5.00,
    		'pre_ven'=>7.00,
    		'img'=>'https://www.google.com.ec/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjzpLfw8vzVAhUDLSYKHe9ZCxMQjRwIBw&url=http%3A%2F%2Fensamble321.blogspot.com%2F2012%2F11%2Fsistema-operativo-particion-formateo-y.html&psig=AFQjCNHTm07Z_c8Lp462W54ml-jcomJONA&ust=1504111698267040',
    		'prgr_tittle'=>'Formateado con disco',
    		'descripcion'=>'Se elimina toda la información del equipo.',
    		'nuevo'=>1,
    		'promocion'=>1,
    		'catalogo'=>1,
    		'is_active'=>1
    		] );
    	
    	Service::create( [
    		'id'=>2,
    		'nombre'=>'Respaldo información',
    		'codbarra'=>'0000002',
    		'cant'=>'1',
    		'pre_com'=>7.00,
    		'pre_ven'=>7.00,
    		'img'=>NULL,
    		'prgr_tittle'=>'Respaldo de información en discos externos',
    		'descripcion'=>'Respaldo de información en discos externos.',
    		'nuevo'=>1,
    		'promocion'=>1,
    		'catalogo'=>1,
    		'is_active'=>1
    		] );
    	
    	Service::create( [
    		'id'=>3,
    		'nombre'=>'Recuperar Información',
    		'codbarra'=>'0000003',
    		'cant'=>'1',
    		'pre_com'=>7.00,
    		'pre_ven'=>7.00,
    		'img'=>NULL,
    		'prgr_tittle'=>'Recuperado de información del sistema.',
    		'descripcion'=>'Recuperado de información del sistema.',
    		'nuevo'=>1,
    		'promocion'=>1,
    		'catalogo'=>1,
    		'is_active'=>1
    		] );
    	
    	Service::create( [
    		'id'=>4,
    		'nombre'=>'Recuperar arranque del sistema',
    		'codbarra'=>'0000004',
    		'cant'=>'1',
    		'pre_com'=>7.00,
    		'pre_ven'=>7.00,
    		'img'=>NULL,
    		'prgr_tittle'=>'Recuperación del arranque del sistema operativo.',
    		'descripcion'=>'Recuperación del arranque del sistema operativo.',
    		'nuevo'=>1,
    		'promocion'=>1,
    		'catalogo'=>1,
    		'is_active'=>1
    		] );
    	
    	Service::create( [
    		'id'=>5,
    		'nombre'=>'Instalación sistema',
    		'codbarra'=>'000005',
    		'cant'=>'1',
    		'pre_com'=>9.00,
    		'pre_ven'=>9.00,
    		'img'=>NULL,
    		'prgr_tittle'=>'Instalación de sistema operativo',
    		'descripcion'=>'Instalación de sistema operativo.',
    		'nuevo'=>1,
    		'promocion'=>1,
    		'catalogo'=>1,
    		'is_active'=>1
    		] );
    }
}
