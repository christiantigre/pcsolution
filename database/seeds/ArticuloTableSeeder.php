<?php

use Illuminate\Database\Seeder;
use App\Articulo;

class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create( ['id'=>1,'articulo'=>'COMPUTADOR','cod_articulo'=>'COM','status'=>'1'] );
        Articulo::create( ['id'=>2,'articulo'=>'IMPRESORA','cod_articulo'=>'IMP','status'=>'1'] );
        Articulo::create( ['id'=>3,'articulo'=>'CARGADOR','cod_articulo'=>'CRG','status'=>'1'] );
        Articulo::create( ['id'=>4,'articulo'=>'ROUTER','cod_articulo'=>'ROU','status'=>'1'] );
        Articulo::create( ['id'=>5,'articulo'=>'TECLADO','cod_articulo'=>'TEC','status'=>'1'] );
        Articulo::create( ['id'=>6,'articulo'=>'CPU','cod_articulo'=>'CPU','status'=>'1'] );
        Articulo::create( ['id'=>7,'articulo'=>'FUENTE','cod_articulo'=>'FUE','status'=>'1'] );
    }
}
