<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	Marca::create( [
    		'id'=>1,
    		'marca'=>'Asus',
    		'descripcion'=>'Descripcion',
    		'logo'=>'Descripcion',
    		'created_at'=>'2017-07-21 20:22:18',
    		'updated_at'=>'2017-07-21 20:22:18'
    		] );



    	Marca::create( [
    		'id'=>2,
    		'marca'=>'HP',
    		'descripcion'=>'Descripcion',
    		'logo'=>'Descripcion',
    		'created_at'=>'2017-07-21 20:23:02',
    		'updated_at'=>'2017-07-21 20:23:02'
    		] );



    	Marca::create( [
    		'id'=>3,
    		'marca'=>'Toshiba',
    		'descripcion'=>'Descripcion',
    		'logo'=>'Descripcion',
    		'created_at'=>'2017-07-21 20:23:17',
    		'updated_at'=>'2017-07-21 20:23:17'
    		] );



    	Marca::create( [
    		'id'=>4,
    		'marca'=>'Dell',
    		'descripcion'=>'Descripcion',
    		'logo'=>'Descripcion',
    		'created_at'=>'2017-07-21 20:25:22',
    		'updated_at'=>'2017-07-21 20:25:22'
    		] );



    	Marca::create( [
    		'id'=>5,
    		'marca'=>'Lenovo',
    		'descripcion'=>'Des',
    		'logo'=>'Des',
    		'created_at'=>'2017-07-21 20:25:56',
    		'updated_at'=>'2017-07-21 20:25:56'
    		] );



    	Marca::create( [
    		'id'=>6,
    		'marca'=>'Mac',
    		'descripcion'=>'Des',
    		'logo'=>'Des',
    		'created_at'=>'2017-07-21 20:26:14',
    		'updated_at'=>'2017-07-21 20:26:14'
    		] );



    	Marca::create( [
    		'id'=>7,
    		'marca'=>'Samsung',
    		'descripcion'=>'Des',
    		'logo'=>'Des',
    		'created_at'=>'2017-07-21 20:26:29',
    		'updated_at'=>'2017-07-21 20:26:29'
    		] );



    	Marca::create( [
    		'id'=>8,
    		'marca'=>'Compaq',
    		'descripcion'=>'Des',
    		'logo'=>'des',
    		'created_at'=>'2017-07-21 20:26:55',
    		'updated_at'=>'2017-07-21 20:26:55'
    		] );



    	Marca::create( [
    		'id'=>9,
    		'marca'=>'Acer',
    		'descripcion'=>'Des',
    		'logo'=>'des',
    		'created_at'=>'2017-07-21 20:27:11',
    		'updated_at'=>'2017-07-21 20:27:11'
    		] );



    	Marca::create( [
    		'id'=>10,
    		'marca'=>'Sony Vaio',
    		'descripcion'=>'des',
    		'logo'=>'des',
    		'created_at'=>'2017-07-21 20:27:28',
    		'updated_at'=>'2017-07-21 20:27:28'
    		] );



    	Marca::create( [
    		'id'=>11,
    		'marca'=>'IBM',
    		'descripcion'=>'DES',
    		'logo'=>'DES',
    		'created_at'=>'2017-07-21 20:28:01',
    		'updated_at'=>'2017-07-21 20:28:01'
    		] );



    	Marca::create( [
    		'id'=>12,
    		'marca'=>'LG',
    		'descripcion'=>'DES',
    		'logo'=>'DES',
    		'created_at'=>'2017-07-21 20:28:24',
    		'updated_at'=>'2017-07-21 20:28:24'
    		] );



    	Marca::create( [
    		'id'=>13,
    		'marca'=>'CANON',
    		'descripcion'=>'DES',
    		'logo'=>'DES',
    		'created_at'=>'2017-07-21 20:28:37',
    		'updated_at'=>'2017-07-21 20:28:37'
    		] );



    	Marca::create( [
    		'id'=>14,
    		'marca'=>'EPSON',
    		'descripcion'=>'DES',
    		'logo'=>'DES',
    		'created_at'=>'2017-07-21 20:28:46',
    		'updated_at'=>'2017-07-21 20:28:46'
    		] );




    }
}
