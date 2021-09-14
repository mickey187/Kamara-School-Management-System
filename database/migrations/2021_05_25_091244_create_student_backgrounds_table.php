<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_reason')->nullable(true);
            $table->string('suspension_status')->nullable(true);
            $table->string('expulsion_status')->nullable(true);
            $table->string('previous_special_education')->nullable(true);
            $table->string('citizenship')->nullable(false);
            $table->string('previous_school')->nullable(true);
            $table->string('native_tongue')->nullable(false);
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
        Schema::dropIfExists('student_backgrounds');
    }
}
