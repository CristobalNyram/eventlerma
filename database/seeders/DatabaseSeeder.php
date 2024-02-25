<?php
namespace Database\Seeders;

use App\Http\Controllers\TypeEventController;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //here is for run all seeders
        $this->call([ActionsTableSeeder::class]);
        $this->call([ConfigurationsTableSeeder::class]);
        $this->call([MenusTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([RelrolmenuTableSeeder::class]);
        $this->call([CarrersTableSeeder::class]);///this before the user
        $this->call([UsersTableSeeder::class]);
        $this->call([CoursesTableSeeder::class]);
        $this->call([SouvenirsTableSeeder::class]);
        $this->call([SponsorTableSeeder::class]);
        $this->call([TalksTableSeeder::class]);
        $this->call([PackageTableSeeder::class]);
        $this->call([EventsTableSeeder::class]);
        $this->call([TypeEventsTableSeeder::class]);
        $this->call([TypePublicSeeder::class]);
        $this->call([PlaceEventsTableSeeder::class]);




    }

}
