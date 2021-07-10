<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_fees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('payment_load_id');
            $table->foreign('payment_load_id')->references('id')->on('payment_loads')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('amount_payed');

            $table->string('payment_month');

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
        Schema::dropIfExists('tuition_fees');
    }
}
