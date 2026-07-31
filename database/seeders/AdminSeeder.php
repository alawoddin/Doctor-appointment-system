<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'      => 'admin@doccure.com',
            'password'   => Hash::make('admin1234'),
        ]);
    }
}