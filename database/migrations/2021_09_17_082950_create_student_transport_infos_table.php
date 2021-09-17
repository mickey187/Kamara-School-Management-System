<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTransportInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_transport_infos', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(true);
            $table->string('middle_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('transportation_type')->nullable(true);
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
        Schema::dropIfExists('student_transport_infos');
    }
}
