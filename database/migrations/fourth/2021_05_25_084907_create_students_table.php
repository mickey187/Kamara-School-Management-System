<?php

use App\Models\student_background;
use App\Models\student_enrolment;
use App\Models\student_medical_info;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_background_id')->nullable(true);
            $table->foreign('student_background_id')->references('id')->on('student_backgrounds')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('student_medical_info_id')->nullable(true);
            $table->foreign('student_medical_info_id')->references('id')->on('student_medical_infos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('class_id')->nullable(true);
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('stream_id')->nullable(true);
            $table->foreign('stream_id')->references('id')->on('streams')->onUpdate('cascade')->onDelete('cascade');
            $table->string('student_id')->unique()->nullable(false);
            $table->string('image')->unique()->nullable(true);
            $table->string('first_name')->nullable(false);
            $table->string('middle_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->date('birth_year')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('discount')->nullable(true);
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
        Schema::dropIfExists('students');
    }
}
