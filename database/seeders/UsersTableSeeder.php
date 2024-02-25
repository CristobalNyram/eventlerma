<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'first_surname' => 'Admin',
            'second_surname' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('users')->insert([
            'name' => 'Ari',
            'first_surname' => 'Mendes',
            'second_surname' => 'Mendes',
            'role_id' => 2,
            'email' => 'ari@mendes.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Antonio',
            'first_surname' => 'Tobias',
            'second_surname' => 'Huerta',
            'role_id' => 3,
            'email' => 'tobiashuerta12@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('root12p'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Francisco',
            'first_surname' => 'Flores',
            'second_surname' => 'Hernandez',
            'role_id' => 4,
            'email' => 'franciscohuerta@gmail.com',
            'email_verified_at' => now(),
            'career'=>1,
            'password' => Hash::make('root12p'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Daniel',
            'first_surname' => 'Tenorio',
            'second_surname' => 'Hernandez',
            'role_id' => 5,
            'email' => 'danielhuerta12@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('root12p'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Conferencista1',
            'first_surname' => 'Conferencista1',
            'second_surname' => 'Conferencista1',
            'role_id' => 6,
            'email' => 'conferencista1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('conferencista1'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Conferencista2',
        //     'first_surname' => 'Conferencista2',
        //     'second_surname' => 'Conferencista2',
        //     'role_id' => 6,
        //     'email' => 'conferencista2@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('conferencista2'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Conferencista3',
        //     'first_surname' => 'Conferencista3',
        //     'second_surname' => 'Conferencista3',
        //     'role_id' => 6,
        //     'email' => 'conferencista3@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('conferencista3'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Conferencista4',
        //     'first_surname' => 'Conferencista4',
        //     'second_surname' => 'Conferencista4',
        //     'role_id' => 6,
        //     'email' => 'conferencista4@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('conferencista4'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Conferencista5',
        //     'first_surname' => 'Conferencista5',
        //     'second_surname' => 'Conferencista5',
        //     'role_id' => 6,
        //     'email' => 'Conferencista5@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('conferencista5'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista1',
        //     'first_surname' => 'Tallerista1',
        //     'second_surname' => 'Tallerista1',
        //     'role_id' => 6,
        //     'email' => 'Tallerista1@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista1'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista2',
        //     'first_surname' => 'Tallerista2',
        //     'second_surname' => 'Tallerista2',
        //     'role_id' => 6,
        //     'email' => 'Tallerista2@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista2'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista3',
        //     'first_surname' => 'Tallerista3',
        //     'second_surname' => 'Tallerista3',
        //     'role_id' => 6,
        //     'email' => 'Tallerista3@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista3'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista4',
        //     'first_surname' => 'Tallerista4',
        //     'second_surname' => 'Tallerista4',
        //     'role_id' => 6,
        //     'email' => 'Tallerista4@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista4'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista5',
        //     'first_surname' => 'Tallerista5',
        //     'second_surname' => 'Tallerista5',
        //     'role_id' => 6,
        //     'email' => 'Tallerista5@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista5'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista6',
        //     'first_surname' => 'Tallerista6',
        //     'second_surname' => 'Tallerista6',
        //     'role_id' => 6,
        //     'email' => 'Tallerista6@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista6'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista7',
        //     'first_surname' => 'Tallerista7',
        //     'second_surname' => 'Tallerista7',
        //     'role_id' => 6,
        //     'email' => 'Tallerista7@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista7'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista8',
        //     'first_surname' => 'Tallerista8',
        //     'second_surname' => 'Tallerista8',
        //     'role_id' => 6,
        //     'email' => 'Tallerista8@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista8'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista9',
        //     'first_surname' => 'Tallerista9',
        //     'second_surname' => 'Tallerista9',
        //     'role_id' => 6,
        //     'email' => 'Tallerista9@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista9'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Tallerista10',
        //     'first_surname' => 'Tallerista10',
        //     'second_surname' => 'Tallerista10',
        //     'role_id' => 6,
        //     'email' => 'Tallerista10@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('tallerista10'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Roberto',
        //     'first_surname' => 'Castillo',
        //     'second_surname' => 'Hernandez',
        //     'role_id' => 7,
        //     'email' => 'robertohuerta12@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('root12p'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Emilio',
        //     'first_surname' => 'Flores',
        //     'second_surname' => 'Hernandez',
        //     'role_id' => 8,
        //     'email' => 'emiliohuerta12@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('root12p'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
