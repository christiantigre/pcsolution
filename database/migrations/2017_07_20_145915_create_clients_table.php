<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_cli',15)->nullable();
            $table->string('app_cli',15)->nullable();
            $table->string('ci_cli',15)->nullable();
            $table->string('ruc_cli',15)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('tlfn',15)->nullable();
            $table->string('cel',15)->nullable();
            $table->string('mail',25)->nullable();
            $table->string('dir',35)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('clients');
    }
}
