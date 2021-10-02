<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicBackgroundInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_background_infos', function (Blueprint $table) {
            $table->id();
            $table->string('field_of_study') ->nullable(true);
            $table->string('place_of_study') ->nullable(true);
            $table->string('date_of_study') ->nullable(true);
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
        Schema::dropIfExists('academic_background_infos');
    }
}
