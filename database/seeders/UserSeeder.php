<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Owner',
            'email' => 'owner@admin.com',
            'password' => Hash::make('password345@'),
            'no_hp' => '089695276227',
            'role' => 'owner',
            'avatar' => 'pic1.svg'
        ]);
    }
}
