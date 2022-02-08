<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
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
                'name' => 'Menunggu Pembayaran',
                'is_finished' => false,
            ],
            [
                'id' => 2,
                'name' => 'Pending',
                'is_finished' => false,
            ],
            [
                'id' => 3,
                'name' => 'Dibatalkan',
                'is_finished' => false,
            ],
            [
                'id' => 4,
                'name' => 'Pembayaran Diterima',
                'is_finished' => true,
            ],
        ];

        PaymentStatus::insert($data);
    }
}
