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
        $this->call(CorporationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(MagazineSeeder::class);
        $this->call(AdminSeed::class);
       
        // \App\Models\User::factory(10)->create();
    }
}
