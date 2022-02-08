<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

use const App\Http\Helpers\STATUS_PUBLISH;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'id' => 1,
            'name' => 'Transfer Bank Manual',
            'file_id' => 3,
            'status' => STATUS_PUBLISH,
        ]);
    }
}
