<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_loads', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('payment_type_id');
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('amount')->nullable(false);

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
        Schema::dropIfExists('payment_loads');
    }
}
