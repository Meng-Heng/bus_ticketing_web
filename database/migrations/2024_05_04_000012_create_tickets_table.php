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
        Schema::create('tbl_ticket', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique();
            $table->timestamp('is_issued')->useCurrent();
            $table->biginteger('bus_seat_id')->unsigned();
            $table->foreign('bus_seat_id')->references('id')->on('tbl_bus_seat');
            $table->biginteger('schedule')->unsigned();
            $table->foreign('schedule')->references('id')->on('tbl_bus_seat_daily');
            $table->biginteger('payment_id')->unsigned();
            $table->foreign('payment_id')->references('id')->on('tbl_payment');
            $table->biginteger('storage_id')->unsigned();
            $table->foreign('storage_id')->references('id')->on('tbl_storage');
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
        Schema::dropIfExists('tbl_ticket');
    }
};
