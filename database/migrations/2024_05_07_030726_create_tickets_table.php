<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('ticket_id')->nullable();
            $table->date('issued_date')->nullable();
            $table->integer('schedule_id')->nullable();
            $table->integer('bus_seat_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->integer('storage_id')->nullable();
            $table->integer('price_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
