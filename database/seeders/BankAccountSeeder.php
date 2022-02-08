<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

use const App\Http\Helpers\STATUS_PUBLISH;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'id' => 1,
            'file_id' => 2,
            'bank_name' => 'BNI',
            'account_number' => '2999123716',
            'account_holder_name' => 'PT. Kobantitar',
            'status' => STATUS_PUBLISH
        ]);
    }
}
