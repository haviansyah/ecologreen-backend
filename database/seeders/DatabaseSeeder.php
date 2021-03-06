<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConfigurationSeeder::class,
            RoleSeeder::class,
            AdminUserSeeder::class,
            CanopyShapeSeeder::class,
            PlantLocationTypeSeeder::class,
        ]);
    }
}
