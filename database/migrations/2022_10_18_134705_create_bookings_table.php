<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->string('booking_code');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('email');
            $table->string('arrival_time')->nullable();
            $table->string('hotel_name');
            $table->string('booked_location');
            $table->string('bookoption');
            $table->date('checkin_date')->nullable();
            $table->date('checkout_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('timing')->nullable();
            $table->string('amount_paid')->nullable();    
            $table->string('payment_method');
            $table->boolean('payment_status')->default(0);
            $table->integer('no_people')->default(0);
            $table->boolean('bstatus')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
