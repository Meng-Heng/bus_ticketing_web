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
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('payment_method');
            $table->datetime('payment_datetime')->current();
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_user');
            $table->biginteger('review_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
   
};
