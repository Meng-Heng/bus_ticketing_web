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
            $table->integer('carry_on');
            $table->integer('luggage');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_paid');
            $table->biginteger('paid_by')->unsigned();
            $table->foreign('paid_by')->references('id')->on('tbl_payment');
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
