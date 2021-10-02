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
            $table->string('city')->nullable(true);
            $table->string('unit')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('kebele')->nullable(true);
            $table->string('p_o_box')->nullable(true);
            $table->string('home_phone_number')->nullable(true);
            $table->string('work_phone_number')->nullable(true);
            $table->string('phone_number')->nullable(true);
            // $table->integer('alternative_phone_number')->nullable(false);
            $table->string('house_number')->nullable(true);
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
