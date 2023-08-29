<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin::create([
            'name' => 'Md Ashraful Islam',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
