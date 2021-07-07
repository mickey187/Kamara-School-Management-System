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
            $table->foreign('student_id') ->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');;
            $table->integer('yearly_average')->nullable(false);
            $table->integer('transfered_from')->nullable(false);
            $table->integer('transfered_to')->nullable(false);
            $table->string('pass_fail_status')->nullable(false);
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
