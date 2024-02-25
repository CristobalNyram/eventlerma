<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'name' => 'Consultar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Editar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Actualizar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Eliminar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Desactivar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Crear',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Autorizar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'Cancelar',
            'created_at' => now(),
        ]);
        DB::table('actions')->insert([
            'name' => 'No autorizar',
            'created_at' => now(),
        ]);

    }
}
