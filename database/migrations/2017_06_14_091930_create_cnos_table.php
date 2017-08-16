<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->string('categoria');
            $table->string('categoria_desc');
            $table->string('nivel');
            $table->string('clasificacion');
            $table->string('ocupacion');
            $table->string('desc_ocupacion');
            $table->string('cod_profesion');
            $table->string('prioridad');
            $table->string('cod_area');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cnos');
    }
}
