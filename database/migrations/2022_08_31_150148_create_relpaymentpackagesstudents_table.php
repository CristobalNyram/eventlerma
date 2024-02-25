<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelpaymentpackagesstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relpaymentpackagesstudents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_student_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_approved_id')->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->unsignedBigInteger('user_canceled_id')->nullable();
            $table->timestamp('canceled_date')->nullable();
            $table->string('comment')->nullable();
            $table->string('status',2);
            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('user_student_id')->references('id')->on('users');
            $table->foreign('user_approved_id')->references('id')->on('users');
            $table->foreign('user_canceled_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relpaymentpackagesstudents');
    }
}
