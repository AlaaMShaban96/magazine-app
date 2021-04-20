<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('magazines')->insert([
            [
                'name' =>' الادب و العلوم',
                'image'=>'https://upload.wikimedia.org/wikipedia/en/9/9a/Attack_on_Titan_The_Final_Season_Key_Visual_2.png',
                'corporation_id' =>1,
                'rating_id' =>2,
                'country_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' =>'تبين لدراسات الفكرية ة التقافية',
                'image'=>'https://upload.wikimedia.org/wikipedia/en/9/9a/Attack_on_Titan_The_Final_Season_Key_Visual_2.png',
                'corporation_id' =>2,
                'rating_id' =>2,
                'country_id' =>2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' =>'هجوم العمالقة',
                'image'=>'https://upload.wikimedia.org/wikipedia/en/9/9a/Attack_on_Titan_The_Final_Season_Key_Visual_2.png',
                'corporation_id' =>4,
                'rating_id' =>3,
                'country_id' =>2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
       
        ]);
    }
}
