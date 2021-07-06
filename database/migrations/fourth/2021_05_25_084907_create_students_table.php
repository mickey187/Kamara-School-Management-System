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
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('parents');
            $table->unsignedBigInteger('student_background_id');
            $table->foreign('student_background_id')->references('id')->on('student_backgrounds');
            $table->unsignedBigInteger('student_medical_info_id');
            $table->foreign('student_medical_info_id')->references('id')->on('student_medical_infos');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');

            $table->string('first_name')->nullable(false);
            $table->string('middle_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->date('birth_year')->nullable(false);
            $table->string('gender')->nullable(false);
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