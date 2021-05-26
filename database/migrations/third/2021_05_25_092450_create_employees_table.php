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
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('job_experience_id');
            $table->foreign('job_experience_id')->references('id')->on('employee_job_experiences');
            $table->unsignedBigInteger('employee_religion_id');
            $table->foreign('employee_religion_id')->references('id')->on('employee_religions');
            $table->unsignedBigInteger('employee_job_position_id');
            $table->foreign('employee_job_position_id')->references('id')->on('employee_job_positions');
            $table->unsignedBigInteger('employee_emergency_contact_id');
            $table->foreign('employee_emergency_contact_id')->references('id')->on('employee_emergency_contacts');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');

            $table->string ('first_name') ->nullable(false);
            $table->string ('middle_name') ->nullable(false);
            $table->string('last_name') ->nullable(false);
            $table->string('gender') ->nullable(false);
            $table->date('birth_date') ->nullable(false);
            $table->string('hired_date') ->nullable(false);
            $table->string('education_status')  ->nullable(false);
            $table->string('marrage_status')  ->nullable(false);
            $table->string('previous_employment')  ->nullable(false);
            $table->string('special_skill')  ->nullable(false);
            $table->integer('net_salary')  ->nullable(false);
            $table->string('job_trainning')  ->nullable(false);
            $table->string('nationality')  ->nullable(false);
            $table->integer('hire_type')  ->nullable(false);
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
