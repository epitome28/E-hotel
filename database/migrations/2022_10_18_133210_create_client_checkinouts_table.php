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
        Schema::create('client_checkinouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_alt_phone')->nullable();
            $table->string('room_type');
            $table->string('bookoption');
            $table->string('duration');
            $table->string('timing')->nullable();
            $table->string('amount_paid');
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->time('time_alert')->nullable();
            $table->string('checkedin_by')->nullable();
            $table->string('checkedout_by')->nullable();
            $table->string('no_people')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('discount')->nullable();
            $table->string('autorized_by')->nullable();
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
        Schema::dropIfExists('client_checkinouts');
    }
};
