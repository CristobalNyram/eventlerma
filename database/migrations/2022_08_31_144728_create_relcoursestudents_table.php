<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelcoursestudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relcoursestudents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_student_id');
            $table->unsignedBigInteger('user_approved_id')->nullable();
            $table->unsignedBigInteger('user_cancel_id')->nullable();
            $table->unsignedBigInteger('user_canceled_id')->nullable();
            $table->unsignedBigInteger('previous_course_id')->nullable();
            $table->string('status')->default(2);
            $table->timestamps();
            //-3 no alcanzo cupo en ningun curso // -2 borrado //-1 inactivo // 1 pendiente //2 activo
            ///inactivo = corresponde a una persona que aun no ha pagado su entreda o paquete pero esta incrito a este curso
            //pendiente = ya pago el usuario pero el curso ya estaba lleno
            //activo =correponde a una persona que  ya pago y puede ingresar al curso y tambien cupo en el curso

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relcoursestudent');
    }
}
