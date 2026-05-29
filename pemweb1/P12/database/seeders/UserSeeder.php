<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void
    {
        User::create([
            'name' => 'Admin Satu',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Dua',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Tiga',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
