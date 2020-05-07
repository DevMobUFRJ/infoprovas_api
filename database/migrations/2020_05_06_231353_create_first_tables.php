<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });

        Schema::create('disciplina', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nome');
            $table->integer('periodo')->nullable();

            // FK
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('curso');
        });

        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            
            // FK
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('curso');
        
        });

        Schema::create('usuario_banido', function (Blueprint $table) {
            $table->id();
            $table->string('google_id', 90);
        });

        Schema::create('prova', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 6);
            $table->string('arquivo', 200);
            $table->string('google_id', 90)->nullable();
            $table->integer('denuncias')->unsigned();

            // FKs
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplina');
            $table->foreign('docente_id')->references('id')->on('docente');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prova');
        Schema::dropIfExists('usuario_banido');
        Schema::dropIfExists('docente');
        Schema::dropIfExists('disciplina');
        Schema::dropIfExists('curso');
    }
}
