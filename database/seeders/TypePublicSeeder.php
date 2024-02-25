<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePublicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Infantil', 'status' => '2', 'description' => 'Para público infantil'],
            ['name' => 'Adultos', 'status' => '2', 'description' => 'Para público adultos'],
            ['name' => 'Mixto', 'status' => '2', 'description' => 'Para público mixto'],
            ['name' => 'Otro', 'status' => '2', 'description' => 'Otro tipo de público'],
        ];

        DB::table('type_public')->insert($types);
    }
}
