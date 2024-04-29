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
        Schema::create('tbl_station', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("p_address");
            $table->string("s_address")->nullable();
            $table->string("commune")->nullable();
            $table->string("district")->nullable();
            $table->string("city");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
