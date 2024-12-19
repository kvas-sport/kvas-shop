<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
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
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'), // Не забудьте захешировать пароль
            'phone' => '1234567890',
            'role' => 'admin', // Указываем роль админа
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('123'), // Не забудьте захешировать пароль
            'phone' => '0987654321',
            'role' => 'user', // Указываем роль пользователя
        ]);
    }
}
