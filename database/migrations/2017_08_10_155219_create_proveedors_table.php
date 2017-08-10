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
            $table->string('nom_pro');
            $table->string('app_pro');
            $table->string('dir');
            $table->string('tlfn');
            $table->string('cel_movi');
            $table->string('cel_claro');
            $table->string('fax');
            $table->string('mail');
            $table->string('web');
            $table->string('ruc');
            $table->string('representante');
            $table->string('actividad');
            $table->string('logo');
            $table->integer('id_pais')->unsigned();
            $table->integer('id_provincia')->unsigned();
            $table->integer('id_canton')->unsigned();
            $table->boolean('status');
            $table->string('empresa');
            $table->string('ubicacion');
            $table->string('latitud');
            $table->string('longitud');
            $table->foreign('id_pais')->references('id')->on('pais');
            $table->foreign('id_provincia')->references('id')->on('provincias');
            $table->foreign('id_canton')->references('id')->on('ciudads');
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
