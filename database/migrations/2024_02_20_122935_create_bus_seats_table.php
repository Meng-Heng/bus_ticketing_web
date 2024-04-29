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
        Schema::create('tbl_bus_seat', function (Blueprint $table) {
            $table->id();
            $table->biginteger('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('tbl_bus');
            $table->biginteger('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('tbl_seat');
            $table->biginteger('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('tbl_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_seats');
    }
};
