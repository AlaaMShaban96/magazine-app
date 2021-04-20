<?php

namespace Database\Seeders;

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
        $this->call(AdminSeed::class);
        $this->call(UserSeeder::class);
        $this->call(CorporationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(MagazineSeeder::class);
        $this->call(FolderSeeder::class);
        $this->call(NumberSeeder::class);
        $this->call(ReadingSeeder::class);
       
        // \App\Models\User::factory(10)->create();
    }
}
