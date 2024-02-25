<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\TypeSponsor;

class TypeSponsorsSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Norteños', 'description' => ''],
            ['name' => 'Mariachis', 'description' => ''],
            ['name' => 'Orquesta', 'description' => ''],
            ['name' => 'Grupo músical salsa', 'description' => ''],
            ['name' => 'Grupo músical cumbia', 'description' => ''],
            ['name' => 'Banda', 'description' => ''],
            ['name' => 'Grupo músical urbano', 'description' => ''],
            ['name' => 'Otros', 'description' => ''],
        ];

        foreach ($types as $type) {
            TypeSponsor::create([
                'name' => $type['name'],
                'description' => $type['description'],
            ]);
        }
    }
}
