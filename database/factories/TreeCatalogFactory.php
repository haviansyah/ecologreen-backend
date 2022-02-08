<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use const App\Http\Helpers\STATUS_PUBLISH;

class TreeCatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tree_species_id' => 1,
            'plant_location_id' => 1,
            'status' => STATUS_PUBLISH,
            'price' => 3500000
        ];
    }
}
