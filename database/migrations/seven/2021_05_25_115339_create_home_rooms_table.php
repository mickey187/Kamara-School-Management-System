<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_rooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id') ->references('id')->on('classes');
            //$table->foreign('section_id') ->references('id')->on('sections');
            // $table->unsignedBigInteger('stream_id');
            // $table->foreign('stream_id') ->references('id')->on('streams');
            // $table->unsignedBigInteger('address_id');
            // $table->foreign('address_id') ->references('id')->on('addresses');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id') ->references('id')->on('employees');
            $table->unsignedBigInteger('attendance_id')->nullable(true);
            $table->foreign('attendance_id') ->references('id')->on('attendances');
            $table->string('section');
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
        Schema::dropIfExists('home_rooms');
    }
}
