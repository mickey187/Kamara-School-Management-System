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
            // $table->unsignedBigInteger('subject_id');
            // $table->foreign('subject_id') ->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsignedBigInteger('course_load_id')->nullable(true);
            // $table->foreign('course_load_id') ->references('id')->on('teacher_course_loads')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('academic_background_id');
            $table->foreign('academic_background_id') ->references('id')->on('academic_background_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_training_info_id');
            $table->foreign('teacher_training_info_id') ->references('id')->on('training_institution_infos')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('teacher_id') ->unique()->nullable(false);
            $table->string('debut_as_a_teacher') ->nullable(true);
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
        Schema::dropIfExists('teachers');
    }
}
