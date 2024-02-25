<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelrolmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relrolmenus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');//referens in what mnodule is
            $table->unsignedBigInteger('role_id');
            $table->string('status')->default(-2);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('relrolmenus');
    }
}
