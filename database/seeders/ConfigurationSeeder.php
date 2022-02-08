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
                'configuration_title' => Configuration::APP_NAME,
                'configuration_value' => 'EcoLoGreen',
            ],
            [
                'configuration_title' => Configuration::APP_VERSION,
                'configuration_value' => '1.0.1',
            ],
            [
                'configuration_title' => Configuration::APP_VERSION_NUMBER,
                'configuration_value' => 1,
            ],
        ];

        Configuration::insert($data);
    }
}
