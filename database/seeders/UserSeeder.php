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
                'api_token' =>'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYWYyYjJjNzYzMWExNWJjNWU5ODAxZWQyYzVkMjU4OThkMjU3MzM4M2ZkZTg2MjkzY2IwMDQwZTJlNmQ4NzQ2NDRmYmZlMWE3MmY5NDFhOTAiLCJpYXQiOjE2MTkxOTQ1MjAuMzY0MTY5LCJuYmYiOjE2MTkxOTQ1MjAuMzY0MTc0LCJleHAiOjE2NTA3MzA1MjAuMzYxMjA0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.HVMlA-aVTgr1QyE8385-HYpLnW80OOkXXXOuE_grSl6GwUdj5FFJEK5QFTT_mp2b4fjzmIJkx9YI_sT08etQNjHT_4KdljdJrdWM3t2FI98DmAWFBCG4lbVtnCKq4W8FRrtVdeoTAftQgiHkJLM2DWP-eZ-c-vV8PIs5L8ZiAUdX09d7dOdw4acszqO2tx5dPKBcu2UEVAsHS8Ekk8qby9Lir_5PH77jr1uPXD5Zvj0zMDg6ShhCCgC1l-jfUWnchiLT5UFjkxZLDSjSkjT3xlLMdV-YMiFQ_L28ccJ-LjrTOXYds8AchWfh6_7YxOPaZ_JgZUoSryOktNaiMqjfKLOuDELUEF8yITsrY6r2p-eqEez5BhpfsUR4SuacyY6xMovLyvUMRIk5nXR-2Rxn0FCT0yiVgjfGVBVIpQ159lJWqXUm2Xy-3t2osQXcKCK6JPhRqJ898Js9RBiWbOBIZliLC6E6-Z-Ehh_5JHu7kEPhBNm2AaiEkSN8GNr7-LHll6qjUqY9eIkM6VvZGmYBwrniucSa8OeFPnNe8MYxui5QL7CGPhQmt8hpktGBfigo3aQ9IemnwvlMvKtfZ46241Gc1jc2ltePDGGWJUyKcVDrzP80dI16XhKXpwkTg1ljZ5Xs3j3EpRjtbi-ft1U0Io7qhd5SmJabMH6Ws87NFOw`',
                'email_verified_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'password' =>Hash::make('1234'),
                ]
            
        ]);
    }
}
