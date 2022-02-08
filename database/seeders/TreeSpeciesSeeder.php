<?php

namespace Database\Seeders;

use App\Models\TreeSpecies;
use Illuminate\Database\Seeder;

class TreeSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreeSpecies::insert([
            [
                'local_name' => 'Trambesi',
                'scientific_name' => 'Samanea Saman',
                'sequestration' => 16.6,
                'max_height' => 30,
                'max_crown_width' => 25,
                'canopy_shape_id' => 2,
                'about' => 'Nama latin pohon trembesi ini adalah Samanea Saman (Rain Tree). Pohon ini aslinya hidup di Amerika Selatan dan sekarang secara natural juga hidup dalam cuaca tropis. Secara natural bisa mencapai pertumbuhan sampai ketinggian 25 meter dan diameter 30 meter.Disebut Pohon Hujan (Rain Tree) karena air yang sering menetes dari tajuknya yang disebabkan kemampuannya menyerap air tanah yang kuat. Daunnya juga sangat sensitif terhadap cahaya dan menutup secara bersamaan dalam cuaca mendung (ataupun gelap) sehingga air hujan dapat menyentuh tanah langsung melewati lebatnya kanopi pohon ini. Rerumputan juga berwarna lebih hijau dibawah pohon hujan dibandingkan dengan rumput di sekelilingnya.' 
            ]
        ]);
    }
}
