<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable(false);
            $table->string('subcity')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('kebele')->nullable(true);
            $table->integer('p_o_box')->nullable(true);
            $table->integer('phone_number')->nullable(false);
            $table->integer('alternative_phone_number')->nullable(false);
            $table->integer('house_number')->nullable(true);
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
        Schema::dropIfExists('addresses');
    }
}
