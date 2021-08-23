<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('stream_id');
            $table->foreign('stream_id')->references('id')->on('streams')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->string('section_label')->nullable();
            $table->string('day')->nullable();
            $table->integer('period_number')->nullable();
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
        Schema::dropIfExists('class_subjects');
    }
}
