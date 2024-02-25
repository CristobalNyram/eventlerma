<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlaceEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        DB::table('place_events')->insert([
            'place_name' => $faker->city,
            'status' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('place_events')->insert([
            'place_name' => $faker->city,
            'status' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
