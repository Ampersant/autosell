<?php

namespace Database\Seeders;
use App\Models\Type;
use App\Models\Mark;
use App\Models\MarkModel;
use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMarkModelFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $auto = Type::create(['name' => 'Auto']);
        $moto = Type::create(['name' => 'Moto']);
        
        Form::create([
            'name' => 'Coupe',
            'type_id' => $auto->id
        ]);
        Form::create([
            'name' => 'Sedan',
            'type_id' => $auto->id
        ]);
        Form::create([
            'name' => 'Street',
            'type_id' => $moto->id
        ]);
        Form::create([
            'name' => 'Sport',
            'type_id' => $moto->id
        ]);
        Form::create([
            'name' => 'Motorrad',
            'type_id' => $moto->id
        ]);

        $mercedes = Mark::create([
            'name' => 'Mercedec-Benz',
            'type_id' => $auto->id       
        ]);
        $audi = Mark::create([
            'name' => 'Audi',
            'type_id' => $auto->id       
        ]);
        $suzuki = Mark::create([
            'name' => 'Suzuki',
            'type_id' => $moto->id       
        ]);
        
        MarkModel::create([
            'name' => 'SLS 300',
            'mark_id' => $mercedes->id
        ]);
        MarkModel::create([
            'name' => 'CLS 350',
            'mark_id' => $mercedes->id
        ]);
        MarkModel::create([
            'name' => 'R6',
            'mark_id' => $audi->id
        ]);
        MarkModel::create([
            'name' => 'A5',
            'mark_id' => $audi->id
        ]);
        MarkModel::create([
            'name' => 'GSX-R 600',
            'mark_id' => $suzuki->id
        ]);
        MarkModel::create([
            'name' => 'Bandit 500',
            'mark_id' => $suzuki->id
        ]);

    }
}
