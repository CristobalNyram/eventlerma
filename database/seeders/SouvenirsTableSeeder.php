<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class SouvenirsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('souvenirs')->insert([
            'name' => 'Paquete Junior',
            'price' => '150.00',
            'description' => '
            *Entrada
            *Libreta
            *Stickers',
            'url_img' => 'argon/souvenir/1665088211-bottel.png',
            
        ]);

        DB::table('souvenirs')->insert([
            'name' => 'Paquete Senior',
            'price' => '250.00',
            'description' => '
            *Entrada
            *Libreta
            *Taza personalizada',
            'url_img' => 'argon/souvenir/1665092042-cup.png',
        ]);
        DB::table('souvenirs')->insert([
            'name' => 'Paquete Master',
            'price' => '350.00',
            'description' => '
            *Entrada
            *Libreta
            *Playera personalizada del Frreedomday',
            'url_img' => 'argon/souvenir/1665088826-playera.png',
        ]);
    }
}
