<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bus_id')->nullable();
            $table->string('leave')->nullable();
            $table->dateTime('departure_date')->nullable();
            $table->dateTime('departure_time')->nullable();
            $table->string('destination')->nullable();
            $table->dateTime('arrival_date')->nullable();
            $table->dateTime('arrival_time')->nullable();
            $table->boolean('sole_out')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedules');
    }
}
