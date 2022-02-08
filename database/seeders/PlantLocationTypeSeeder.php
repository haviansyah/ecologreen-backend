<?php

namespace Database\Seeders;

use App\Models\PlantLocationType;
use Illuminate\Database\Seeder;

class PlantLocationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Forest'
            ],
            [
                'id' => 2,
                'name' => 'Road Side'
            ],
            [
                'id' => 3,
                'name' => 'Other Place'
            ],
        ];
        PlantLocationType::insert($data);
    }
}
