<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'), // Enkripsi password
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'kepala_kantor',
                'email' => 'kepala_kantor@example.com',
                'password' => Hash::make('password'),
                'role' => 'kepala kantor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'ki',
                'email' => 'ki@example.com',
                'password' => Hash::make('password'),
                'role' => 'ki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'subbagian_umum',
                'email' => 'subbagian_umum@example.com',
                'password' => Hash::make('password'),
                'role' => 'subbagian umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'kantor',
                'email' => 'kantor@example.com',
                'password' => Hash::make('password'),
                'role' => 'kantor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'kanwil',
                'email' => 'kanwil@example.com',
                'password' => Hash::make('password'),
                'role' => 'kanwil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'petugas',
                'email' => 'petugas@example.com',
                'password' => Hash::make('password'),
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
