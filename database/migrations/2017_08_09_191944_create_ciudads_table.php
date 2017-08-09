<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiudadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudads', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ciudad',35);
            $table->string('iso',15);
            $table->boolean('status')->default(1);
            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('provincias');
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
        Schema::drop('ciudads');
    }
}
