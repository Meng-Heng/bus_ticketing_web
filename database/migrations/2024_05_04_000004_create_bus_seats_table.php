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
            $table->string("seat_number");
            $table->string('seat_type');
            $table->biginteger('storage_id')->unsigned();
            $table->foreign('storage_id')->references('id')->on('tbl_storage');
            $table->biginteger('price_id')->unsigned();
            $table->foreign('price_id')->references('id')->on('tbl_price');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
