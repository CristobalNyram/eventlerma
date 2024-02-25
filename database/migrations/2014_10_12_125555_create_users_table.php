<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->string('curp',20)->unique()->nullable();
            $table->string('date_birth')->nullable();
            $table->string('gender',3,['H','M','N/A'])->default('H');
            $table->string('phone_number',15)->nullable();
            $table->string('address',255)->nullable();
            $table->string('blood_type',2)->nullable();;
            // $table->string('professional_license')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');



      //data of the students
      $table->date('user_image_updated')->nullable();//matricula
      $table->string('license_plate')->nullable()->unique();//matricula
      $table->unsignedBigInteger('career')->nullable();
      $table->string('enrollment',8)->nullable();
      $table->string('quarter',50,['1° Primero','4° Cuarto','7° Séptimo','10° Décimo'])->nullable();
      $table->string('group',1,['A','B','C','D'])->nullable();
      //data of the students

      //data of the speacker
      $table->string('academic_level')->nullable();
      $table->string('description')->nullable();
      $table->string('specialty')->nullable();
      $table->string('speaker_cv')->nullable();
      //data of the speacker


            $table->string('user_image')->nullable();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('status',2)->default(2);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('career')->references('id')->on('carrers');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
