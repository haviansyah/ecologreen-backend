<?php

namespace Database\Seeders;

use App\Models\CanopyShape;
use Illuminate\Database\Seeder;

class CanopyShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'V-Shape'],
            ['name' => 'Menjurai'],
            ['name' => 'Bulat'],
            ['name' => 'Oval'],
            ['name' => 'Berkolom'],
            ['name' => 'Piramidal'],
        ];

        CanopyShape::insert($data);
    }
}
