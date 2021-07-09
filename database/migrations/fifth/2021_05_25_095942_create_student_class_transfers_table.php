<?php

use App\Models\student_semister_average;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id') ->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('transfered_from')->nullable(true);
            $table->foreign('transfered_from') ->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('transfered_to')->nullable(true);
            $table->foreign('transfered_to') ->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('yearly_average')->nullable(false);
            $table->string('academic_year')->nullable(false);
            $table->string('status')->nullable(false);
            $table->boolean('isRegistered')->nullable(false);
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
        Schema::dropIfExists('student_class_transfers');
    }
}
