<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_bus_seat_daily', function (Blueprint $table) {
            $table->id();
            $table->biginteger('bus_seat_id')->unsigned();
            $table->foreign('bus_seat_id')->references('id')->on('tbl_bus_seat');
            $table->string('destination');
            $table->string('departure_date');
            $table->string('departure_time');
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->boolean('is_sold');
            $table->biginteger('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('tbl_station');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_seat_dailies');
    }
};
