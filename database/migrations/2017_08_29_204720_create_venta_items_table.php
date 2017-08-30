<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto',35)->nullable();
            $table->string('codbarra',35)->nullable();
            $table->string('precio',35)->nullable();
            $table->string('cant',20)->nullable();
            $table->double('total',15,2)->nullable();
            $table->integer('id_venta')->unsigned();
            $table->integer('id_producto')->unsigned();            
            $table->foreign('id_venta')->references('id')->on('ventas');
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
        Schema::dropIfExists('venta_items');
    }
}
