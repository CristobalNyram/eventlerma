<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelpackagessourvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relpackagessourvenirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('souvenir_id');
            $table->unsignedBigInteger('status')->default(2);
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('souvenir_id')->references('id')->on('souvenirs');
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
        Schema::dropIfExists('relpackagessourvenirs');
    }
}
