<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'adminku',
            'email'=>'adminku@huhuy.com',
            'password'=>Hash::make('huhuy123'),
            'role'=>'admin'
        ]);
    }
}
