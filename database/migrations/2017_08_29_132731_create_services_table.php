<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',35)->nullable();
            $table->string('codbarra',35)->nullable();
            $table->string('cant',35)->nullable();
            $table->double('pre_com',15,2)->nullable();
            $table->double('pre_ven',15,2)->nullable();
            $table->string('img',300)->nullable();
            $table->string('prgr_tittle',150)->nullable();
            $table->string('descripcion',299)->nullable();
            $table->boolean('nuevo')->default(1);
            $table->boolean('promocion')->default(1);
            $table->boolean('catalogo')->default(1);
            $table->boolean('is_active')->default(1);
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
        Schema::drop('services');
    }
}
