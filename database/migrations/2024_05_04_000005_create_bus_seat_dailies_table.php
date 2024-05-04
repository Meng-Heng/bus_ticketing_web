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
            $table->biginteger('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('tbl_bus');
            $table->string('start_point');
            $table->string('departure_date');
            $table->string('departure_time');
            $table->string('destination');
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->boolean('sold_out');
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
