<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_job_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id')->nullable(true);
            $table->foreign('address_id') ->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');;
            $table->timestamps();
            $table->string('past_job_position')->nullable(true);
            $table->string('past_employee_place')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_job_experiences');
    }
}
