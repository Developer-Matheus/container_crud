<?php

namespace Database\Seeders;

use App\Models\MovementType;
use Illuminate\Database\Seeder;

class MovementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovementType::create([
            'type' => 'Embarque'
        ]);

        MovementType::create([
            'type' => 'Descarga'
        ]);

        MovementType::create([
            'type' => 'Gate IN'
        ]);

        MovementType::create([
            'type' => 'Gate OUT'
        ]);

        MovementType::create([
            'type' => 'Reposicionamento'
        ]);

        MovementType::create([
            'type' => 'Pesagem'
        ]);
        MovementType::create([
            'type' => 'Scanner'
        ]);
    }
}
