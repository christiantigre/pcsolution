<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('secuencial',35)->nullable();
            $table->string('numerofactura',35)->nullable();
            $table->string('claveacceso',35)->nullable();
            $table->string('total',35)->nullable();
            $table->string('subtotal',35)->nullable();
            $table->string('valorconiva',35)->nullable();
            $table->string('valorsiniva',35)->nullable();
            $table->string('valorcondescuento',35)->nullable();
            $table->date('fecha_venta')->nullable();
            $table->string('responsable',35)->nullable();
            $table->string('cantidad_items',5)->nullable();
            $table->integer('id_iva')->unsigned();
            $table->integer('id_descuento')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_vendedor')->unsigned();
            $table->integer('id_tipopago')->unsigned();
            $table->integer('id_estadopago')->unsigned();
            $table->boolean('status')->default(1);
            $table->foreign('id_iva')->references('id')->on('ivas');
            $table->foreign('id_descuento')->references('id')->on('descuentos');
            $table->foreign('id_cliente')->references('id')->on('clients');
            $table->foreign('id_vendedor')->references('id')->on('personals');
            $table->foreign('id_tipopago')->references('id')->on('tipopagos');
            $table->foreign('id_estadopago')->references('id')->on('estadopagos');
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
        Schema::drop('ventas');
    }
}
