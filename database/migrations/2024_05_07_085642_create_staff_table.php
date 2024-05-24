<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('picture')->nullable();
            $table->string('hometown')->nullable();
            $table->string('identification')->nullable();
            $table->string('residency')->nullable();
            $table->integer('contact')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('position')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff');
    }
}
