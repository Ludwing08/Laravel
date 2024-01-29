<?php

namespace Database\Seeders;

use App\Models\Sim;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     "name" => "Juan",
        //     'email' => 'juan@gmail.com',
        //     'password'=> bcrypt('123456789'),
        // ]);

        // User::create([
        //     "name" => "Emilio",
        //     'email' => 'e@gmail.com',
        //     'password'=> bcrypt('123456789'),
        // ]);

        // User::create([
        //     "name" => "Gael",
        //     'email' => 'g@gmail.com',
        //     'password'=> bcrypt('123456789'),
        // ]);

        // User::create([
        //     "name" => "Galileo",
        //     'email' => 'ga@gmail.com',
        //     'password'=> bcrypt('123456789'),
        // ]);

        Sim::create([
            "company" => "PORTA",
            "serial" => 00001,
            "phone_id" => 1
        ]);

        
        Sim::create([
            "company" => "MOVISTAR",
            "serial" => 00002,
            "phone_id" => 2
        ]);

        
        Sim::create([
            "company" => "TUENTI",
            "serial" => 00003,
            "phone_id" => 1
        ]);
    }
}
