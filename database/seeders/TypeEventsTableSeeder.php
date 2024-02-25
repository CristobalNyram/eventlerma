<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_events')->insert([
            'type_name' => "PUBLICO",
            'status' =>2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('type_events')->insert([
            'type_name' => "PRIVADO",
            'status' =>2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
