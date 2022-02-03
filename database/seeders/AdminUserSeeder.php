<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'email'      => 'admin@ecologreen.com',
                'name'          => 'Administrator',
                'role_id'       => Role::ADMIN,
                'password'      => Hash::make('password'),
            ),
            array(
                'email'      => 'tester@example.com',
                'name'          => 'Tester',
                'role_id'       => Role::CUSTOMER,
                'password'      => Hash::make('password'),
            )
        );

        User::insert($data);
    }
}
