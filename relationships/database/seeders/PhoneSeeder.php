<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Phone::create([
        //     "prefix" => 593,
        //     "phone_number" => 984512632,
        //     "user_id" => 1
        // ]            
        // );

        Phone::create([
            "prefix" => 34,
            "phone_number" => 78978975,
            "user_id" => 1
        ]            
        );

        Phone::create([
            "prefix" => 01,
            "phone_number" => 78974865,
            "user_id" => 1
        ]            
        );

    }
}
