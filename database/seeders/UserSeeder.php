<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'username' => 'admin',
                'password' => Hash::make("admin"),
                'name' => 'Nanas',
                'role' => 'admin',

            ],
            [
                'username' => 'author',
                'password' => Hash::make("author"),
                'name' => 'Jeje',
                'role' => 'author',

            ],

        ])->each(function ($user) {
            User::create($user);
        });
    }
}
