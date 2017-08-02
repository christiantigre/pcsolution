<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_work', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('num_secuencial',15)->nullable();
            $table->date('fecha_orden')->nullable();
            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('articulos');
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->string('modelo',30)->nullable();
            $table->string('serie',30)->nullable();
            $table->string('problema_reportado',255)->nullable();
            $table->string('notas',255)->nullable();
            $table->string('responsable',50)->nullable();
            $table->date('fecha_reparacion')->nullable();
            $table->string('sello',150)->nullable();
            $table->string('nomcli',45)->nullable();
            $table->string('appcli',45)->nullable();
            $table->string('tlfncli',45)->nullable();
            $table->string('celcli',45)->nullable();
            $table->string('mailcli',45)->nullable();
            $table->string('cicli',45)->nullable();
            $table->string('dircli',45)->nullable();
            $table->decimal('anticipo',9,2)->nullable();
            $table->decimal('valor',9,2)->nullable();
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clients');
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
        Schema::dropIfExists('order_work');
    }
}
