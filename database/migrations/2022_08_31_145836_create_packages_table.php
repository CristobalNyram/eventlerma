<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('status',2)->default(2);
            $table->unsignedBigInteger('souvenir_id');
            $table->unsignedBigInteger('souvenir2_id')->nullable();
            $table->string('badge_color_card')->nullable();
            $table->foreign('souvenir_id')->references('id')->on('souvenirs');
            $table->foreign('souvenir2_id')->references('id')->on('souvenirs');

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
        Schema::dropIfExists('packages');
    }
}
