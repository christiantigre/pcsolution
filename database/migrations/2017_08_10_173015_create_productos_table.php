<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',35)->nullable();
            $table->string('slug',300)->nullable();
            $table->string('codbarra',20)->nullable();
            $table->string('cant',5)->nullable();
            $table->double('pre_com',8,2)->nullable();
            $table->double('pre_ven',8,2)->nullable();
            $table->string('img',300)->nullable();
            $table->string('prgr_tittle',300)->nullable();
            $table->boolean('nuevo')->default(1);
            $table->boolean('promocion')->default(0);
            $table->boolean('catalogo')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('articulo_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
