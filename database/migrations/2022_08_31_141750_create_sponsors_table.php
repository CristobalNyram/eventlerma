<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('slogan')->nullable();
            $table->string('url_img')->nullable(); // Cambié el nombre del campo a image_url
            $table->string('status', 2)->default('2');
            $table->unsignedBigInteger('origin_state_id')->nullable(); // Origen en inglés
            $table->string('phone_number')->nullable(); // Num_Tel en inglés
            $table->string('email')->nullable(); // Correo_electrónico en inglés
            $table->unsignedBigInteger('type_sponsor_id')->nullable(); // Tipo en inglés
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
        Schema::dropIfExists('sponsors');
    }
}
