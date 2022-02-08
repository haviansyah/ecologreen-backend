<?php

namespace Database\Seeders;

use App\Models\TreeCatalog;
use Illuminate\Database\Seeder;

class TreeCatalogDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreeCatalog::factory()->count(100)->create()->each(function($e){
            /** @var TreeCatalog $e */
            $e->images()->attach(1);
        });
    }
}
