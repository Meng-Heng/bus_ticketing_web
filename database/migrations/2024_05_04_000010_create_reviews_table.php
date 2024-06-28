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
        Schema::create('tbl_review', function (Blueprint $table) {
            $table->id();
            $table->decimal('star');
            $table->string('feedback', 255);
            $table->datetime('posted_time');
            $table->biginteger('payment_id')->unsigned();
            $table->foreign('payment_id')->references('id')->on('tbl_payment');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
