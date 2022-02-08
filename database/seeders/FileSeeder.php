<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
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
                'name' => '02b540b52c2d993ddab2f77a5d6577e8BwXS7M.png',
                'type' => 'png',
                'file_address' => '/uploads/02b540b52c2d993ddab2f77a5d6577e8BwXS7M.png',
                'thumbnail_address' => '/uploads/thumbnail/02b540b52c2d993ddab2f77a5d6577e8BwXS7M.png',
                'is_temporary' => false,
            ],
            [
                'id' => 2,
                'name' => 'ed8253ee6da84eb673ed20c8d8e50568lRaJBo.png',
                'type' => 'png',
                'file_address' => '/uploads/ed8253ee6da84eb673ed20c8d8e50568lRaJBo.png',
                'thumbnail_address' => '/uploads/thumbnail/ed8253ee6da84eb673ed20c8d8e50568lRaJBo.png',
                'is_temporary' => false,
            ],
            [
                'id' => 3,
                'name' => 'b3fb962cfc2bfe42879466f932e781445y6gTR.png',
                'type' => 'png',
                'file_address' => '/uploads/b3fb962cfc2bfe42879466f932e781445y6gTR.png',
                'thumbnail_address' => '/uploads/thumbnail/b3fb962cfc2bfe42879466f932e781445y6gTR.png',
                'is_temporary' => false,
            ],
        ];

        File::insert($data);
    }
}
