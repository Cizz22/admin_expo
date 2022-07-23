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
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('payment_proof');
            $table->string('payment_no');
            $table->string('payment_method');
            $table->integer('ticket_total');
            $table->string('ticket_type');
            $table->enum('booking_status', ['Terverifikasi', 'Belum Terverifikasi'])->default('Belum Terverifikasi');
            $table->string('payment_total');
            $table->boolean("is_process")->default(false);
            $table->string("code_ref");
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
