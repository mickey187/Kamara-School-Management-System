<?php

use App\Models\assasment_type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarkListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_mark_lists', function (Blueprint $table) {
            $table->id();
            $table->date('academic_year');
            $table->foreign('assasment_type')->references('id')->on('assasment_type');
            $table->foreign('subject')->references('id')->on('subject');
            $table->foreign('class')->references('id')->on('class');
            $table->foreign('teacher')->references('id')->on('teacher');
            $table->foreign('semister')->references('id')->on('semister');
            $table->foreign('student')->references('id')->on('student');
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
        Schema::dropIfExists('student_mark_lists');
    }
}
