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
            $table->string('staff_id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('position');
            $table->string('date_of_birth');
            $table->string('place_of_birth')->nullable();
            $table->string('id_card');
            $table->string('residency')->nullable();
            $table->string('contact');
            $table->boolean('is_active');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
