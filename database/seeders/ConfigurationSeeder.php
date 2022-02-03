<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
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
                'configuration_title' => 'app_name',
                'configuration_value' => 'EcoLoGreen',
            ],
            [
                'configuration_title' => 'app_version',
                'configuration_value' => '1.0.1',
            ],
        ];

        Configuration::insert($data);
    }
}
