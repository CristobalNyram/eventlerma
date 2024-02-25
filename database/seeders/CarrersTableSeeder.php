<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrers')->insert([
            'name' => 'TIC: Desarrollo de Software Multiplataforma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carrers')->insert([
            'name' => 'TIC: Redes Inteligentes y Ciberseguridad',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carrers')->insert([
            'name' => 'ING: Desarrollo y Gestión de Software Multiplataforma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('carrers')->insert([
            'name' => 'ING: Redes Inteligentes y Ciberseguridad',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
