<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description'); // Cambiado a 'text' para permitir más texto
            $table->date('date');
            $table->time('time')->nullable();

            $table->string('url_photo')->nullable(); // Hacerlo nullable si la foto no es obligatoria
            $table->string('duration'); // ¿Este es el formato adecuado para la duración? Puede ser un 'time' en lugar de 'string'
            $table->decimal('cost', 8, 2);
            $table->unsignedBigInteger('type_event_id');
            $table->unsignedBigInteger('place_id'); // Cambiado a 'place_id' para simplificar
            $table->unsignedBigInteger('type_public_id'); // Cambiado a 'place_id' para simplificar
            $table->unsignedBigInteger('capacity');
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
        Schema::dropIfExists('events');
    }
}
