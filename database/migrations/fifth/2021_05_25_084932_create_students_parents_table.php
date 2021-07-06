<?php

use App\Models\address;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateStudentsParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->unsignedBigInteger('student');
            $table->foreign('student')->references('id')->on('students');
            $table->string('first_name')->nullable(false);
            $table->string('middle_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('relation')->nullable(false);
            $table->integer('school_closur_priority')->nullable(true);
            $table->integer('emergency_contact_priority')->nullable(false);
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
        Schema::dropIfExists('parents');
    }
}