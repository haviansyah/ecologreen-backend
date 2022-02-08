<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
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
                'id' => 1,
                'email'      => 'admin@ecologreen.com',
                'name'          => 'Administrator',
                'role_id'       => Role::ADMIN,
                'password'      => Hash::make('password'),
                'email_verified_at' => Carbon::now()
            ),
            array(
                'id'            => 2,
                'email'         => 'tester@example.com',
                'name'          => 'Tester',
                'role_id'       => Role::CUSTOMER,
                'password'      => Hash::make('password'),
                'email_verified_at' => Carbon::now()
            )
        );

        User::insert($data);
        Profile::insert([
            ['user_id' => 1],
            ['user_id' => 2],
        ]);
    }
}
