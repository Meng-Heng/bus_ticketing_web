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
        Schema::create('tbl_seat', function (Blueprint $table) {
            $table->id();
            $table->string("seat_number");
            $table->biginteger('seat_type_id')->unsigned();
            $table->foreign('seat_type_id')->references('id')->on('tbl_seat_type');
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
