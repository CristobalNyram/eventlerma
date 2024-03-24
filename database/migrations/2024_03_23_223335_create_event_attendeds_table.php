<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAttendedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_attendeds', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default(2);
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('attendee_id');
            $table->string('payment_status')->default(1);
            $table->text('note')->nullable();
            $table->string('payment_receipt_url')->nullable();
            $table->string('payment_method');
            $table->timestamp('payment_date')->nullable();
            $table->boolean('attendance')->default(false); // Nueva columna de asistencia
            $table->timestamp('attendance_date')->nullable(); // Nueva columna de fecha de asistencia
            $table->timestamps();

            // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            // $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_attendeds');
    }
}
