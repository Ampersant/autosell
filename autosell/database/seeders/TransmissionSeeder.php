<?php

namespace Database\Seeders;

use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transmission::create(['type' => 'Mechanic']);
        Transmission::create(['type' => 'Automatic']);
        Transmission::create(['type' => 'Tiptronic']);
    }
}
