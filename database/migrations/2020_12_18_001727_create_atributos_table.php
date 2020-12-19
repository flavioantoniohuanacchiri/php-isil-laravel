<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10);
            $table->string('nombre', 50);
            $table->enum('estado', ['ACTIVO', 'INACTIVO', '0', '1']);

            $table->unsignedBigInteger('atributotipo_id');
            $table->foreign('atributotipo_id')->references('id')->on('atributo_tipos');

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
        Schema::dropIfExists('atributos');
    }
}
