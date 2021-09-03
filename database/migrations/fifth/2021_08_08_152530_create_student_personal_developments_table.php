<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPersonalDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personal_developments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('semister_id')->nullable(false);
            $table->foreign('semister_id')->references('id')->on('semisters')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('trait_id')->nullable(false);
            $table->foreign('trait_id')->references('id')->on('student_traits')->onDelete('cascade')->onUpdate('cascade');
            $table->string('trait_value')->nullable(true);
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
        Schema::dropIfExists('student_personal_developments');
    }
}
