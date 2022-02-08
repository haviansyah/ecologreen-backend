<?php

namespace Database\Seeders;

use App\Models\PlantLocation;
use App\Models\PlantLocationType;
use Illuminate\Database\Seeder;

class PlantLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlantLocation::insert([
            [
                'plant_location_type_id' => 3,
                'name' => 'Kab. Tangerang',
                'address' => 'Kab. Tangerang, Banten, Indonesia',
            ]
        ]);
    }
}
