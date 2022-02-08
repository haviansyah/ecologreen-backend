<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeederDev extends Seeder
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
            TreeSpeciesSeeder::class,
            PlantLocationSeeder::class,
            FileSeeder::class,
            BankAccountSeeder::class,
            PaymentMethodSeeder::class,
            PaymentStatusSeeder::class,
            TreeCatalogDummySeeder::class,
        ]);
    }
}
