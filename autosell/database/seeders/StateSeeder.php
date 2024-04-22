<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create(['name' => 'After accident']);
        State::create(['name' => 'Poor']);
        State::create(['name' => 'Not good']);
        State::create(['name' => 'Ok']);
        State::create(['name' => 'Normal']);
        State::create(['name' => 'Good']);
        State::create(['name' => 'New']);
    }
}
