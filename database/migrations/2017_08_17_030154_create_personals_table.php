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
            $table->string('nom_per',35)->nullable();
            $table->string('app_per',35)->nullable();
            $table->string('dir',60)->nullable();
            $table->string('tlfn',15)->nullable();
            $table->string('cedula',15)->nullable();
            $table->string('pasaporte',15)->nullable();
            $table->string('cel_movi',15)->nullable();
            $table->string('cel_claro',15)->nullable();
            $table->string('genero',10)->nullable();
            $table->string('estado_civil',10)->nullable();
            $table->string('hijos',5)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->integer('id_pais')->unsigned()->default(1);
            $table->integer('id_provincia')->unsigned()->default(1);
            $table->integer('id_canton')->unsigned()->default(1);
            $table->integer('id_cargo')->unsigned()->default(1);
            $table->integer('id_user')->unsigned();
            $table->string('foto',60)->nullable();
            $table->boolean('status')->default(1);
            $table->string('mail',45)->nullable();
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
