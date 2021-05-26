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
            $table->foreign('role')->references('id')->on('Role');
            $table->foreign('job_experience')->references('id')->on('job_experience');
            $table->foreign('employee_religion')->references('id')->on('employee_religion');
            $table->foreign('employee_job_position')->references('id')->on('employee_job_position');
            $table->foreign('employee_emergency_contact')->references('id')->on('employee_emergency_contact');
            $table->foreign('address')->references('id')->on('address');
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
