<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\OriginState;

class OriginStatesSeeder extends Seeder
{
    public function run()
    {
        $states = [
            ['name' => 'Aguascalientes', 'description' => ''],
            ['name' => 'Baja California', 'description' => ''],
            ['name' => 'Baja California Sur', 'description' => ''],
            ['name' => 'Campeche', 'description' => ''],
            ['name' => 'Chiapas', 'description' => ''],
            ['name' => 'Chihuahua', 'description' => ''],
            ['name' => 'Coahuila', 'description' => ''],
            ['name' => 'Colima', 'description' => ''],
            ['name' => 'Ciudad de México', 'description' => ''],
            ['name' => 'Durango', 'description' => ''],
            ['name' => 'Guanajuato', 'description' => ''],
            ['name' => 'Guerrero', 'description' => ''],
            ['name' => 'Hidalgo', 'description' => ''],
            ['name' => 'Jalisco', 'description' => ''],
            ['name' => 'México', 'description' => ''],
            ['name' => 'Michoacán', 'description' => ''],
            ['name' => 'Morelos', 'description' => ''],
            ['name' => 'Nayarit', 'description' => ''],
            ['name' => 'Nuevo León', 'description' => ''],
            ['name' => 'Oaxaca', 'description' => ''],
            ['name' => 'Puebla', 'description' => ''],
            ['name' => 'Querétaro', 'description' => ''],
            ['name' => 'Quintana Roo', 'description' => ''],
            ['name' => 'San Luis Potosí', 'description' => ''],
            ['name' => 'Sinaloa', 'description' => ''],
            ['name' => 'Sonora', 'description' => ''],
            ['name' => 'Tabasco', 'description' => ''],
            ['name' => 'Tamaulipas', 'description' => ''],
            ['name' => 'Tlaxcala', 'description' => ''],
            ['name' => 'Veracruz', 'description' => ''],
            ['name' => 'Yucatán', 'description' => ''],
            ['name' => 'Zacatecas', 'description' => ''],
        ];

        foreach ($states as $state) {
            OriginState::create([
                'name' => $state['name'],
                'description' => $state['description'],
            ]);
        }
    }
}
