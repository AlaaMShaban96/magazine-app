<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
            'name' =>'admin',
            'email' =>'admin@nano-tech.ly',
            'role' =>'admin',
            'password' =>Hash::make('1234'),
            ]
        
    ]);
    }
}
