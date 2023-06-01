<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Daniel Felipe',
            'email' => 'danyfelipe117@gmail.com',
            'email_verified_at' => now(),
            'date' => '2000-06-05',
            'password' => bcrypt('123456789'), // password
            'address' => 'Calle 13 # 13-20',
            'cedula' => '1010128327',
            'modality' => 'virtual',
            'gender' => 'Hombre',
            'phone' => '3125020352',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Julian Reyes',
            'email' => 'julicalderon2022@gmail.com',
            'email_verified_at' => now(),
            'date' => '2000-06-05',
            'password' => bcrypt('123456789'), // password
            'address' => 'Calle 13 # 13-20',
            'cedula' => '1010128327',
            'modality' => 'virtual',
            'gender' => 'Hombre',
            'phone' => '3125020352',
            'role' => 'estudiante',
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
