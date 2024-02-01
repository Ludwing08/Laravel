<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create([
            "content" => "Note of biology",
            "value" => 9,50
        ]);

        Note::create([
            "content" => "Note of biology",
            "value" => 10,0
        ]);
    }
}
