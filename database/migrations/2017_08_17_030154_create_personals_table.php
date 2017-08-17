<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom_per',35);
            $table->string('app_per',35);
            $table->string('dir',60);
            $table->string('tlfn',15);
            $table->string('cel_movi',15);
            $table->string('cel_claro',15);
            $table->string('genero',10);
            $table->string('estado_civil',10);
            $table->string('hijos',5);
            $table->date('fecha_nac');
            $table->integer('id_pais')->unsigned();
            $table->integer('id_provincia')->unsigned();
            $table->integer('id_canton')->unsigned();
            $table->integer('id_cargo')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->boolean('status')->default(1);
            $table->foreign('id_pais')->references('id')->on('pais');
            $table->foreign('id_provincia')->references('id')->on('provincias');
            $table->foreign('id_canton')->references('id')->on('cantons');
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::drop('personals');
    }
}
