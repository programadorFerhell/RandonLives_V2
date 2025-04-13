<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_genero_games')->insert([
            ['nome' => 'FPS', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'RPG', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Estratégia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
