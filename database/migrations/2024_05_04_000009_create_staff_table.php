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
        Schema::create('tbl_staff', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_user');
            $table->binary('picture');
            $table->string('hometown')->nullable();
            $table->string('identification');
            $table->string('residency')->nullable();
            $table->string('contact');
            $table->boolean('is_active');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_staff');
    }
};
