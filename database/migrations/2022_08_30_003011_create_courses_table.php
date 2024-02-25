<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('date');
            $table->string('url_img');
            $table->string('maximum_person');
            $table->string('requeriments');
            $table->string('hour');
            $table->string('duration');
            $table->string('status',2)->default(2);
            $table->string('status_course',2)->default(2);//2 lleno //1 disponible
            $table->unsignedBigInteger('speaker_id');
            $table->foreign('speaker_id')->references('id')->on('users');
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
        Schema::dropIfExists('courses');
    }
}
