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
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('student');
            $table->foreign('student')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name')->nullable(true);
            $table->string('parent_id')->uniqid()->nullable(true);
            $table->string('middle_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('relation')->nullable(true);
            $table->integer('school_closur_priority')->nullable(true);
            $table->integer('emergency_contact_priority')->nullable(true);
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
