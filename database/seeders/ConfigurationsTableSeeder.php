<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'title' => 'Logo del sistema',
            'type' => 'Info',
            'description' => 'Logo del sistema',
            'content' => 'iniciador.jpg',
            'created_at' => now(),
        ]);
        DB::table('configurations')->insert([
            'title' => 'Título de sistema',
            'type' => 'Info',
            'description' => 'Contiene las configuraciones grandes',
            'content' => 'LERMA CRM',
            'created_at' => now(),
        ]);
        DB::table('configurations')->insert([
            'title' => 'Nombre de la intitución',
            'type' => 'Info',
            'description' => 'Nombre de la intitición',
            'content' => 'LERMA',
            'created_at' => now(),
        ]);
        DB::table('configurations')->insert([
            'title' => 'Autor del sistema',
            'type' => 'Info',
            'description' => 'Indica información del creador del sistema',
            'content' => 'Mirey System',
            'created_at' => now(),
        ]);
    }
}
