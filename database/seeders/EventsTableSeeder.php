<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES'); // Configurar Faker para español

        DB::table('events')->insert([
            'name' =>"BAILE CULTURA BREACK DANCE",
            'slug' => "baile_cultural_breack_dance",
            'description' => "baile para bailar",
            'date' => $faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
            'url_photo' => "uploads/events/iniciador.jpg",
            'duration' => $faker->randomElement(['1 hora', '2 horas', '3 horas']),
            'cost' => $faker->randomFloat(2, 10, 100),
            'type_event_id' => 1, // Ajusta según tus tipos de eventos
            'place_id' => 1, // Ajusta según tus lugares de eventos
            'type_public_id' => 1, // Ajusta según tus lugares de eventos

            'capacity' => $faker->numberBetween(20, 100),
            'status' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'name' =>"BAILE CULTURA  DE POP",
            'slug' => "baile_cultural_de_pop",
            'description' => "baile para bailar",
            'date' => $faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
            'url_photo' => "uploads/events/iniciador.jpg",
            'duration' => $faker->randomElement(['1 hora', '2 horas', '3 horas']),
            'cost' => $faker->randomFloat(2, 10, 100),
            'type_event_id' => 1, // Ajusta según tus tipos de eventos
            'place_id' => 1, // Ajusta según tus lugares de eventos
            'type_public_id' => 1, // Ajusta según tus lugares de eventos
            'capacity' => $faker->numberBetween(20, 100),
            'status' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
