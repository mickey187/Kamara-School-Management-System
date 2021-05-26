<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hirer_id');
            $table->foreign('hirer_id') ->references('id')->on('employees');
            $table->unsignedBigInteger('hiree_id');
            $table->foreign('hiree_id') ->references('id')->on('employees');
            $table->timestamps();
            $table->date('date') ->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hires');
    }
}
