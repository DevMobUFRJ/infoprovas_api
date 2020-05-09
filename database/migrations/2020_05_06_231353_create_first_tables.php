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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });

        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nome');
            $table->integer('periodo')->nullable();

            // FK
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            
            // FK
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
        
        });

        Schema::create('usuarios_banidos', function (Blueprint $table) {
            $table->id();
            $table->string('google_id', 90);
        });

        Schema::create('tipos_provas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('ordem');
        });

        Schema::create('provas', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 6);
            $table->string('arquivo', 200);
            $table->string('google_id', 90)->nullable();
            $table->integer('denuncias')->unsigned();

            // FKs
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('tipos_provas_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->foreign('tipos_provas_id')->references('id')->on('tipos_provas');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provas');
        Schema::dropIfExists('tipos_provas');
        Schema::dropIfExists('usuarios_banidos');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('disciplinas');
        Schema::dropIfExists('cursos');
    }
}
