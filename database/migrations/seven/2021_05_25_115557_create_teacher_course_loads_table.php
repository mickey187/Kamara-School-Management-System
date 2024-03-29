<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCourseLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_course_loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            // $table->unsignedBigInteger('subject_id');
            // $table->foreign('subject_id')->references('id')->on('subjects');
            // $table->unsignedBigInteger('class_id') ->nullable(true);
            // $table->foreign('class_id')->references('id')->on('classes');
            $table->unsignedBigInteger('course_load_id') ->nullable(true);
            $table->foreign('course_load_id')->references('id')->on('course_loads')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('stream') ->nullable(true);
            // $table->string('section') ->nullable(true);
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
        Schema::dropIfExists('teacher_course_loads');
    }
}
