<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                'name' =>'user name',
                'email' =>'test@test.ly',
                'api_token' =>'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYW`',
                'email_verified_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'password' =>Hash::make('1234'),
                ]
            
        ]);
    }
}
