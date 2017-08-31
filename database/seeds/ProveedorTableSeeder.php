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
            'cedula'=>NULL,
            'pasaporte'=>NULL,
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
            'longitud'=>'n/n'
            ] );



        Proveedor::create( [
            'id'=>2,
            'nom_pro'=>'MegaComputers',
            'app_pro'=>'Ters',
            'dir'=>'Tomas Ordoñes 9-22 entre Bolívar y Gran Colombia',
            'cedula'=>NULL,
            'pasaporte'=>NULL,
            'tlfn'=>'072827403',
            'cel_movi'=>'0987502221',
            'cel_claro'=>NULL,
            'fax'=>NULL,
            'mail'=>'sanmartin_95@hotmail.com',
            'web'=>'https://www.facebook.com/megacomputers1/about?lst=100008947060315%3A100006432784569%3A1504100771',
            'ruc'=>'0103457081001',
            'representante'=>'Chuncho Sanmartín Enrique Balívar',
            'actividad'=>'Venta de equipos de computación y suministros.',
            'logo'=>NULL,
            'id_pais'=>66,
            'id_provincia'=>1,
            'id_canton'=>1,
            'status'=>1,
            'empresa'=>'MegaCompuTers',
            'ubicacion'=>NULL,
            'latitud'=>NULL,
            'longitud'=>NULL
            ] );



        Proveedor::create( [
            'id'=>3,
            'nom_pro'=>'PC-EXPERTOS',
            'app_pro'=>'IMPOR&DIST CIA. LTDA.',
            'dir'=>'Presidente Cordova 2-21 y Manuel Vega 0101100 Cuenca',
            'cedula'=>NULL,
            'pasaporte'=>NULL,
            'tlfn'=>NULL,
            'cel_movi'=>'0987485725',
            'cel_claro'=>'0995640756',
            'fax'=>NULL,
            'mail'=>'marcopc-expertos@hotmail.com',
            'web'=>'www.pc-expertos.com.ec',
            'ruc'=>NULL,
            'representante'=>NULL,
            'actividad'=>'Distribuidor Autorizado',
            'logo'=>NULL,
            'id_pais'=>66,
            'id_provincia'=>1,
            'id_canton'=>1,
            'status'=>1,
            'empresa'=>'PC-EXPERTOS',
            'ubicacion'=>NULL,
            'latitud'=>NULL,
            'longitud'=>NULL
            ] );



        Proveedor::create( [
            'id'=>4,
            'nom_pro'=>'Compuram',
            'app_pro'=>'Ram',
            'dir'=>'Juan Jaramillo 1-106 y Miguel Angel Estrella',
            'cedula'=>NULL,
            'pasaporte'=>NULL,
            'tlfn'=>'(593) 7 2835852  /  2837688',
            'cel_movi'=>'0969453878',
            'cel_claro'=>NULL,
            'fax'=>NULL,
            'mail'=>'ejecutivo@compuram.net',
            'web'=>'http://www.compuram.net/',
            'ruc'=>NULL,
            'representante'=>NULL,
            'actividad'=>'MAYORISTAS DE COMPUTADORAS, IMPRESORAS, PARTES Y PIEZAS. ADEMÁS SERVICIO TECNICO GARANTIZADO',
            'logo'=>NULL,
            'id_pais'=>66,
            'id_provincia'=>1,
            'id_canton'=>1,
            'status'=>1,
            'empresa'=>'CompuramRam',
            'ubicacion'=>NULL,
            'latitud'=>NULL,
            'longitud'=>NULL
            ] );




    }
}
