<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('job_experience_id')->nullable(true);
            $table->foreign('job_experience_id')->references('id')->on('employee_job_experiences')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('employee_religion_id')->nullable(true);
            $table->foreign('employee_religion_id')->references('id')->on('employee_religions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('employee_job_position_id')->nullable(true);
            $table->foreign('employee_job_position_id')->references('id')->on('employee_job_positions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('employee_emergency_contact_id')->nullable(true);
            $table->foreign('employee_emergency_contact_id')->references('id')->on('employee_emergency_contacts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('address_id')->nullable(true);
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('employee_id') ->unique()->nullable(false);
            $table->string('first_name') ->nullable(true);
            $table->string('middle_name') ->nullable(true);
            $table->string('last_name') ->nullable(true);
            $table->string('gender') ->nullable(true);
            $table->string('birth_date') ->nullable(true);
            $table->string('hired_date') ->nullable(true);
            $table->string('education_status')  ->nullable(true);
            $table->string('marrage_status')  ->nullable(true);
            $table->string('previous_employment')  ->nullable(true);
            $table->string('special_skill')  ->nullable(true);
            $table->integer('net_salary')  ->nullable(true);
            $table->string('job_trainning')  ->nullable(true);
            $table->string('nationality')  ->nullable(true);
            $table->string('hire_type')  ->nullable(true);
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
        Schema::dropIfExists('employees');
    }
}
