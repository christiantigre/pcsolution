<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParroquiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parroquias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('parroquia',35)->nullable();
            $table->string('iso',15)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('canton_id')->unsigned();
            $table->foreign('canton_id')->references('id')->on('cantons');
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
        Schema::drop('parroquias');
    }
}
