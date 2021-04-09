<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            [
            'name' =>'كوميديا',
            ],
            [
            'name' =>'ادب',
            ],
            [
            'name' =>'خيال علمي',
            ],
            [
            'name' =>'كرتون',
            ],
            [
            'name' =>'اكشن',
            ],
            [
            'name' =>'رمنسية',
            ],
        ]);
    }
}
