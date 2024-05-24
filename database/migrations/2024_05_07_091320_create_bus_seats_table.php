<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bus_id')->nullable();
            $table->string('seat_number')->nullable();
            $table->string('seat_type')->nullable();
            $table->integer('storage_id')->nullable();
            $table->integer('price_id')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus_seats');
    }
}
