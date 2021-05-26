<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('debut_as_a_teacher') ->nullable(false);
           $table->foreign('subject') ->references('id')->on('subject');
           $table->foreign('course_load') ->references('id')->on('course_load');
           $table->foreign('academic_background') ->references('id')->on('academic_background');
           $table->foreign('teacher_training_info') ->references('id')->on('teacher_training_info');




    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
           public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
