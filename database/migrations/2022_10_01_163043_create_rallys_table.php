<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRallysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rallies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->string('description');
            $table->string('requirements');
            $table->string('price');
            $table->string('location');
            $table->string('status', 2)->default(2);
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
        Schema::dropIfExists('rallies');
    }
}