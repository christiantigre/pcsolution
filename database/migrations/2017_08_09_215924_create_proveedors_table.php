<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom_pro',35)->nullable();
            $table->string('app_pro',25)->nullable();
            $table->string('dir',35)->nullable();
            $table->string('tlfn',15)->nullable();
            $table->string('cel_movi',15)->nullable();
            $table->string('cel_claro',15)->nullable();
            $table->string('fax',15)->nullable();
            $table->string('mail',45)->nullable();
            $table->string('web',60)->nullable();
            $table->string('ruc',15)->nullable();
            $table->string('representante',35)->nullable();
            $table->string('actividad',150)->nullable();
            $table->string('logo',60)->nullable();
            $table->integer('id_pais')->unsigned();
            $table->integer('id_provincia')->unsigned();
            $table->integer('id_canton')->unsigned();
            $table->boolean('status')->default(1);
            $table->string('empresa',45)->nullable();
            $table->string('ubicacion',15)->nullable();
            $table->string('latitud',15)->nullable();
            $table->string('longitud',15)->nullable();
            $table->foreign('id_pais')->references('id')->on('pais');
            $table->foreign('id_provincia')->references('id')->on('provincias');
            $table->foreign('id_canton')->references('id')->on('cantons');
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
        Schema::drop('proveedors');
    }
}
