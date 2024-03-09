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
        Schema::table('users', function(Blueprint $t) {
            $t->biginteger('user_type_id')->unsigned();
            $t->foreign('user_type_id')->references('id')->on('tbl_user_type');
            $t->string('gender');
            $t->date('date_of_birth');
            $t->string('phone');
            $t->string('hometown');
            $t->string('id_card');
            $t->boolean('is_active');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
