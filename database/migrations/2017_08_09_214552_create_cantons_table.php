<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCantonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('canton',35)->nullable();
            $table->string('iso',15)->nullable();
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
        Schema::drop('cantons');
    }
}
