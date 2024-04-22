<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(['name' => 'Grey']);
        Color::create(['name' => 'Black']);
        Color::create(['name' => 'Green']);
        Color::create(['name' => 'Red']);
        Color::create(['name' => 'Blue']);
        Color::create(['name' => 'White']);
        Color::create(['name' => 'Yellow']);
    }
}
