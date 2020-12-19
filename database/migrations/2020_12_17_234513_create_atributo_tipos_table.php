<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtributoTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributo_tipos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10);
            $table->string('nombre', 50);
            $table->enum('estado', ['ACTIVO', 'INACTIVO', '0', '1']);
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
        Schema::dropIfExists('atributo_tipos');
    }
}
