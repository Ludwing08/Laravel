<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create([
        //     "name" => "Admin"
        // ]);

        // Role::create([
        //     "name" => "Worker"
        // ]);

        // Role::create([
        //     "name" => "user"
        // ]);

        DB::table('user_role')->insert(
            [
                "user_id" => 1,
                "role_id" => 2
            ]
        );

        DB::table('user_role')->insert(
            [
                "user_id" => 4,
                "role_id" => 2
            ]
        );

        DB::table('user_role')->insert(
            [
                "user_id" => 4,
                "role_id" => 3
            ]
        );

        DB::table('user_role')->insert(
            [
                "user_id" => 2,
                "role_id" => 1
            ]
        );

        DB::table('user_role')->insert(
            [
                "user_id" => 3,
                "role_id" => 3
            ]
        );
    }
}
