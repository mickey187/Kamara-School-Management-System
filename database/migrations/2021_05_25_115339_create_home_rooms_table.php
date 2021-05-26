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
            $table->timestamps();
            $table->foreign('class') ->references('id')->on('classes');
            $table->foreign('section') ->references('id')->on('section');
            $table->foreign('stream') ->references('id')->on('stream');
            $table->foreign('address') ->references('id')->on('address');
            $table->foreign('employee') ->references('id')->on('employee');
            $table->foreign('attendance') ->references('id')->on('attendance');
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
