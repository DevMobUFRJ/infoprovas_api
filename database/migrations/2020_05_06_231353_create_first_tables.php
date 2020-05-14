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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->integer('semester')->nullable();

            // FK
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            // FK
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        
        });

        Schema::create('banned_users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id', 90);
        });

        Schema::create('exam_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order');
        });

        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('semester', 6);
            $table->string('file', 200);
            $table->string('google_id', 90)->nullable();
            $table->integer('reports')->unsigned();

            // FKs
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('exam_type_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('exam_type_id')->references('id')->on('exam_types');

            $table->timestamps();
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
        Schema::dropIfExists('exam_types');
        Schema::dropIfExists('banned_users');
        Schema::dropIfExists('professors');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('courses');
    }
}
