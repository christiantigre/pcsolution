<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
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
            $table->string('nombre',35);
            $table->string('slug',300);
            $table->string('codbarra',20);
            $table->string('cant',5);
            $table->double('pre_com',8,2);
            $table->double('pre_ven',8,2);
            $table->string('img',300);
            $table->string('prgr_tittle',300);
            $table->boolean('nuevo')->default(1);
            $table->boolean('promocion')->default(0);
            $table->boolean('catalogo')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('articulo_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('articulo_id')->references('id')->on('articulos');
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
