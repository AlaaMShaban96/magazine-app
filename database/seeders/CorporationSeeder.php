<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorporationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('corporations')->insert([
            [
            'name' =>'مجمع اللغة العربية',
            ],
            [
            'name' =>'لدار أخبار اليوم',
            ],
            [
            'name' =>'صحيفة الجمهورية',
            ],
            [
            'name' =>' الأهرام',
            ],
        ]);
    }
}
