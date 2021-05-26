<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingInstitutionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_institution_infos', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_traning_program') ->nullable(false);
            $table->date('teacher_traning_year') ->nullable(false);
            $table->string('teacher_traning_institute') ->nullable(false);
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
        Schema::dropIfExists('training_institution_infos');
    }
}
