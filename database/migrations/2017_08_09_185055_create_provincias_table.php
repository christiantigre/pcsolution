<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('provincia',35);
            $table->string('iso',15);
            $table->boolean('status')->defaul(1);
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('pais');
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
        Schema::drop('provincias');
    }
}
