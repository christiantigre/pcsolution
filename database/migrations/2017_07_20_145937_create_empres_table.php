local<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_local',15)->nullable();
            $table->string('nom_prop',15)->nullable();
            $table->string('app_prop',15)->nullable();
            $table->string('ci_prop',15)->nullable();
            $table->string('ruc_prop',15)->nullable();
            $table->string('tlfn',15)->nullable();
            $table->string('cel_movi',15)->nullable();
            $table->string('cel_claro',15)->nullable();
            $table->string('mail',25)->nullable();
            $table->string('dir',35)->nullable();
            $table->string('area_especializacion',100)->nullable();
            $table->string('descripcion',255)->nullable();
            $table->string('fax',35)->nullable();
            $table->string('link_web',35)->nullable();
            $table->string('fb',35)->nullable();
            $table->string('tw',35)->nullable();
            $table->string('gog',35)->nullable();
            $table->string('likein',35)->nullable();
            $table->string('logo',150)->nullable();
            $table->string('iso_logotipo',150)->nullable();
            $table->string('slogan',150)->nullable();
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
        Schema::dropIfExists('empres');
    }
}
