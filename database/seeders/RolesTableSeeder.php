<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super admin',
            'description' => 'This user have access to all actions in the system',
            'level' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'This user have access only to the school ,not access to ',
            'level' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'event organizer',
            'description' => 'This user have access only to the school ,not access to ',
            'level' => '3',
            'status' => '-2',
            'created_at' => now(),
            'updated_at' => now()
        ]);


         DB::table('roles')->insert([
             'name' => 'Public general',
             'description' => 'This user is public general ',
             'level' => '4',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('roles')->insert([
             'name' => 'foreigner',
             'description' => 'This for people that in not from of the university ',
             'level' => '5',
             'status' => '-2',
             'created_at' => now(),
             'updated_at' => now()
         ]);
         DB::table('roles')->insert([
             'name' => 'Speaker',
             'description' => 'This person is who speakes in the event ',
             'status' => '-2',
             'level' => '6',
             'created_at' => now(),
             'updated_at' => now()
         ]);
         DB::table('roles')->insert([
             'name' => 'Charger',
             'status' => '-2',
             'description' => 'This person is reponsible for charging money ',
             'level' => '7',
             'created_at' => now(),
             'updated_at' => now()
         ]);

         DB::table('roles')->insert([
             'name' => 'Entry checker',
             'status' => '-2',
             'description' => 'This person only check de the ticket ',
             'level' => '8',
             'created_at' => now(),
             'updated_at' => now()
         ]);





    }
}
