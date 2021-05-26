<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentConductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_conducts', function (Blueprint $table) {
            $table->id();
            $table->string('conduct');
            $table->unsignedBigInteger('semister_id');
            $table->foreign('semister_id')->references('id')->on('semisters');
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
        Schema::dropIfExists('student_conducts');
    }
}
