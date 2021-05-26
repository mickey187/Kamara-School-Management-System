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
            $table->timestamps();
            $table->integer('class') ->nullable(false);
            $table->string('section') ->nullable(false);
            $table->foreign('subject_id')->references('id')->on('subject_id');

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
